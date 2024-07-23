"use strict"
document.addEventListener('DOMContentLoaded', function () {

	/* initialize the external events
	-----------------------------------------------------------------*/

	// var containerEl = document.getElementById('external-events');
	// new FullCalendar.Draggable(containerEl, {
	// 	itemSelector: '.external-event',
	// 	eventData: function (eventEl) {
	// 		return {
	// 			title: eventEl.innerText.trim()
	// 		}
	// 	}

	// });

	//// the individual way to do it
	// var containerEl = document.getElementById('external-events-list');
	// var eventEls = Array.prototype.slice.call(
	//   containerEl.querySelectorAll('.fc-event')
	// );
	// eventEls.forEach(function(eventEl) {
	//   new FullCalendar.Draggable(eventEl, {
	//     eventData: {
	//       title: eventEl.innerText.trim(),
	//     }
	//   });
	// });

	/* initialize the calendar
	-----------------------------------------------------------------*/

	var calendarEl = document.getElementById('calendar');
	var data_list = calendarEl.getAttribute('get_data');
	var base = calendarEl.getAttribute('get_base');
	var ids = calendarEl.getAttribute('get_id');
	// console.log(data_list);
	var calendar = new FullCalendar.Calendar(calendarEl, {
		headerToolbar: {
			left: 'prev,next today',
			center: 'title',
			right: 'dayGridMonth'
		},

		selectable: true,
		selectMirror: true,
		select: function (arg) {
			// var title = prompt('Event Title:');
			Swal.fire({
				title: 'Create New Promo',
				html:
					'<label class="float-start">Title</label>'+
					'<input id="swal-input1" class="swal2-input mt-0">' +
					'<input type="hidden" id="swal-input2" class="swal2-input mt-0" value="'+ids+'">' +
					'<input type="hidden" id="swal-input3" class="swal2-input mt-0" value="'+arg.startStr+'">' +
					'<label class="float-start">Price</label>'+
					'<input id="swal-input4" class="swal2-input inputnumber mt-0">'+
					'<label class="float-start">Select Type:</label>'+
					'<select id="swal-input5" class="default-select form-control wide" >'+
						'<option value="1">High Season</option>'+
						'<option value="2">Special Event</option>'+
					'</select>',
				showCancelButton: true,
				showLoaderOnConfirm: true,
				preConfirm: function () {
					return new Promise(function (resolve) {
						resolve([
							$('#swal-input1').val(),
							$('#swal-input2').val(),
							$('#swal-input3').val(),
							$('#swal-input4').val(),
							$('#swal-input5').val()
						])
					})
				},
				onOpen: function () {
					$('#swal-input1').focus();
					$('input.inputnumber').keyup(function (event) {
						if (event.which >= 37 && event.which <= 40) return;
						$(this).val(function (index, value) {
							return value
								.replace(/\D/g, '')
								.replace(/\B(?=(\d{3})+(?!\d))/g, ".")
								.replace(/^0+/, '')
								;
						});
					});

				},
				allowOutsideClick: () => !Swal.isLoading()
			}).then((result) => {
				if(result.value){
					if(result.value[0] != "" && result.value[3] != ""){
						$.ajax({
							url: base + 'admin/add_promo_actions?data=' + JSON.stringify(result.value),
							dataType: 'html',
							success: function (data) {
								Swal.fire(
									'Added!',
									'Your data has been deleted.',
									'success'
								);
								// console.log(info.event);
								// info.event.remove();

								calendar.addEvent({
									id: data,
									title: result.value[0],
									className: (result.value[4] == 1 ? "bg-primary" : "bg-success"),
									description: "Rp"+result.value[3].toLocaleString('id-ID'),
									start: arg.start,
									allDay: arg.allDay
								})
							}
						})


					}
				}
				
			})

			// if (title) {
			// 	calendar.addEvent({
			// 		title: title,
			// 		start: arg.start,
			// 		allDay: arg.allDay
			// 	})
			// }
			calendar.unselect()
		},

		editable: true,
		droppable: true, // this allows things to be dropped onto the calendar
		drop: function (arg) {
			// is the "remove after drop" checkbox checked?
			if (document.getElementById('drop-remove').checked) {
				// if so, remove the element from the "Draggable Events" list
				arg.draggedEl.parentNode.removeChild(arg.draggedEl);
			}
		},
		eventClick: function (info) {
			//delete event from calender
			Swal.fire({
				title: 'Are you sure delete '+info.event.title+'?',
				text: "You won't be able to revert this!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.value) {
					$.ajax({
						url: base + 'admin/change_status_promo/' + info.event.id,
						dataType: 'html',
						success: function (data) {
							Swal.fire(
								'Deleted!',
								'Your file has been deleted.',
								'success'
							);
							console.log(info.event);
							info.event.remove();
						}
					})

				}
			})

		},
		// initialDate: '2021-02-13',
		weekNumbers: false,
		navLinks: true, // can click day/week names to navigate views
		editable: false,
		selectable: true,
		nowIndicator: true,
		events: data_list,
		eventDidMount: function (info) {
			// console.log(info.event._def.extendedProps.description);
			info.el.append(info.event._def.extendedProps.description);
		}
	});
	calendar.render();

});