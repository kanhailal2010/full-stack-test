$(document).ready(function(){
  //hide progress bar
  $('.progress').hide();

  // Page details form submit
  $("#pageForm").on('submit',function (e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');

    $.ajax(
    {
      type: "POST",
      url: url,
      data: form.serialize(), // serializes the form's elements.
      success: function (data)
      {
        alert(data); // show response from the php script.
      }
    });
  });

  // Image uploader
  $('.input-icons').imageUploader({imagesInputName:'icons'});
  $('.input-images').imageUploader();

  // Tab details form submit
  $("#tabForm").on('submit',function (e) {
    var progress = $('#tabForm .progress');
    var progress_msg = $('#tabForm .progress_msg');
    progress.show();
    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');
    var fData = new FormData(this);

    $.ajax(
    {
      type: "POST",
      url: url,
      type: 'POST',
      data: fData, // serialized form's elements.
      contentType: false,
      processData: false,
      success: function (data)
      {
        let d = JSON.parse(data);
        let msg = "Tab data added successfully";

        if(d.data == undefined ) return false;

        let tab = d.data;
        if(d.type == 'created') {
          tabJsonData.push(d.data);
        }
        else {
          msg = "Tab data edited Successfully";
         tabJsonData = tabJsonData.map(obj => (obj.tab_id == parseInt(tab.tab_id)) ? tab : obj );
        }

        renderTabRow(d.type, tabJsonData.length, tab.tab_id, tab.tab_icon, tab.tab_title);
        renderTabOption();

        progress.hide();
        progress_msg.removeClass().addClass('alert alert-success').html(msg);
      },
      error: function (jqXHR, exception) {
        var msg = "Please Try Again. ";
        if (jqXHR.status === 0) {
            msg += 'Not connected.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg += 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg += 'Internal Server Error [500].';
        } else {
            msg += 'Uncaught Error.\n' + jqXHR.responseText;
        }

        progress.hide();
        progress_msg.removeClass().addClass('alert alert-danger').html(msg);
      },
    });
  });


  // render tabs Row
  function renderTabRow(type, count, id, icon, title) {
    let row = "<div class='row' id='tab_row-"+id+"'><div class='col-md-1'>"+count+"</div> <div class='col-md-1'>"+id+"</div> <div class='col-md-2'><img src='"+icon_dir_url+icon+"' /></div> <div class='col-md-5'>"+title+"</div> <div class='col-md-3'><a href='/crud.php?edit=tab&tab_id="+id+"#tabs' class='btn btn-primary' >Edit</a> / <a href='/edit_delete.php?delete=tab&tab_id="+id+"' class='btn btn-primary' onclick='return confirm(\"Confirm Delete\");'>Delete</a></div> </div>";
    (type == 'created') ? $('.tab_row').append(row) : $('#tab_row-'+id).replaceWith(row);
  }

  // Selected option while editing
  $.fn.selectedO = function(bool) {
    bool ? $(this).attr('selected', 'selected') : false;
    return this;
  }

  // render tab select options
  function renderTabOption(selected){
    let el = $('#sliderTab');
    el.empty().prepend($("<option></option>")
     .attr("value", 0).text('Select Tab'));
    tabJsonData.map(o => el.append($("<option></option>")
     .text(o.tab_title).attr("value", o.tab_id).selectedO(o.tab_id == selectedSlideTabOption)) );
  }

  renderTabOption((selectedSlideTabOption || ''));
  // Tab Slider details form submit
  $("#tabSliderForm").on('submit',function (e) {
    var progress = $('#tabSliderForm .progress');
    var progress_msg = $('#tabSliderForm .progress_msg');
    progress.show();
    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');
    var fData = new FormData(this);

    $.ajax(
    {
      type: "POST",
      url: url,
      type: 'POST',
      data: fData, // serialized form's elements.
      contentType: false,
      processData: false,
      success: function (data)
      {
        let d = JSON.parse(data);
        let msg = 'Slide data ';
        if(d.data == undefined ) return false;
        msg += (d.type == 'updated') ? 'updated' : 'added';
        msg = " successfully. ";
        let slide = d.data;

        renderTabSliderRow(d.type, (tabSlideJsonData.length+1), slide.slide_id, slide.slide_image, slide.slide_title, slide.slide_description, slide.tab_id);

        progress.hide();
        progress_msg.removeClass('alert-danger').addClass('alert-success').html(msg);//.delay(1000).hide();
      },
      error: function (jqXHR, exception) {
        var msg = "Please Try Again. ";
        if (jqXHR.status === 0) {
            msg += 'Not connected.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg += 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg += 'Internal Server Error [500].';
        } else {
            msg += 'Uncaught Error.\n' + jqXHR.responseText;
        }

        progress.hide();
        progress_msg.removeClass('alert-success').addClass('alert-danger').html(msg);
      },
    });
  });

  // render tab slider Row
  function renderTabSliderRow(type, count, id, image, title, description, tab_id) {
    let row = "<div class='row slide_row' id='slide_row-"+id+"'><div class='col-md-1'>"+count+"</div> <div class='col-md-1'>"+tab_id+"</div> <div class='col-md-1'><img src='"+image_dir_url+image+"' /></div> <div class='col-md-2'>"+title+"</div> <div class='col-md-5'>"+description+"</div> <div class='col-md-2'><a href='/crud.php?edit=slider&slide_id="+id+"#tabs' class='btn btn-primary' >Edit</a> / <a href='/edit_delete.php?delete=slider&slide_id="+id+"' class='btn btn-primary' onclick='return confirm(\"Confirm Delete\");'>Delete</a></div> </div>";
    (type == 'created') ? $('.tab_slide_row').append(row) : $('#tab_slide_row-'+id).replaceWith(row);
  }

});