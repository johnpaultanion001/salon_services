$(document).ready(function () {
  window._token = $('meta[name="csrf-token"]').attr('content')

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
        allEditors[i],
        {
            removePlugins: ['ImageUpload']
        }
    );
  }

  moment.updateLocale('en', {
    week: {dow: 1} // Monday is the first day of the week
  })
  //var disabledDate = ['2021-03-08'];
  var today = new Date();
  var tomorrow = new Date();
  tomorrow.setDate(today.getDate() + 1);

  $('.dates').datetimepicker({
    format: 'YYYY-MM-DD',
    locale: 'en',
    minDate: tomorrow,
    sideBySide: true,
    icons: 
    {
        next: 'fa fa-angle-right',
        previous: 'fa fa-angle-left'
    },
    widgetPositioning: {
      horizontal: 'right',
      vertical: 'auto'
  }
   })
   $('.filterdate').datetimepicker({
    format: 'YYYY-MM-DD',
    locale: 'en',
   })


  $('.datetime').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss',
    locale: 'en',
    sideBySide: true
  })

  function getCurrentTime(date) {
      var hours = date.getHours(),
      minutes = date.getMinutes(),
      ampm = hours >= 12 ? 'pm' : 'am';

      hours = hours % 12;
      hours = hours ? hours : 12; // the hour '0' should be '12'
      minutes = minutes < 10 ? '0'+minutes : minutes;

      return hours + ':' + minutes + ' ' + ampm;
      }

      var timeOptions = {
      'timeFormat': 'h:i A',
      'disableTimeRanges': [['12am', getCurrentTime(new Date())]]
    };

  $('.time').datetimepicker({
    format: 'LT',
    stepping: 60,
    enabledHours:[9,10,11,12,13,14,15,16,17,18,19],
    icons: 
    {
        up: 'fa fa-angle-up',
        down: 'fa fa-angle-down'
    },
    widgetPositioning: {
      horizontal: 'right',
      vertical: 'auto'
  }
   
  })

  $('.select-all').click(function () {
    let $select2 = $(this).parent().siblings('.select2')
    $select2.find('option').prop('selected', 'selected')
    $select2.trigger('change')
  })
  $('.deselect-all').click(function () {
    let $select2 = $(this).parent().siblings('.select2')
    $select2.find('option').prop('selected', '')
    $select2.trigger('change')
  })

  $('.select2').select2()

  $('.treeview').each(function () {
    var shouldExpand = false
    $(this).find('li').each(function () {
      if ($(this).hasClass('active')) {
        shouldExpand = true
      }
    })
    if (shouldExpand) {
      $(this).addClass('active')
    }
  })
})
