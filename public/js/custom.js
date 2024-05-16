

$(document).ready(function() { 
       
    if (window.matchMedia('(max-width: 768px)').matches) {
        // Add the class to the desired element
        $('.copyright-footer').addClass('pt-3 pb-5');
    } else {
        // Remove the class if not a mobile device
        $('.copyright-footer').removeClass('pt-3 pb-5');
    }
    $('.accordion-button').on('click', function() {        
        var abtImage = $('#abtImage');
        var newImage = $(this).data('image');        
        abtImage.css("background-image",'url("' + newImage + '")');
        
    });
  
    $("#name").on('change', function () {        
      var name = $("#name").val();     
      var convertedString = name.replace(/\s+/g, '-').toLowerCase();
      $('#slug').val(convertedString);
  }); 
  if(window.location.href.indexOf("about-us") > -1) {
     // Duration of animation in milliseconds
        var str = $(".css-typing").data('text'); 

        var spans = '<span>' + str.split('').join('</span><span>') + '</span>';
        $(spans).hide().appendTo('.css-typing').each(function (i) {
            $(this).delay(10 * i).css({
                display: 'inline',
                opacity: 0.5
            }).animate({
                opacity: 1
            }, 100);
        });

  }
  var owl = $('.owl-carousel');
    owl.owlCarousel({
        center: true,
        autoplay: true,
        singleItem:true,
        items: 1,
        lazyLoad:true,
        loop: true,
        margin: 20,
        nav: true,
        navigation: true,
        
        
        responsive: true,
        items : 1,
        itemsDesktop : [1199,1],
        itemsDesktopSmall : [980,1],
        itemsTablet: [768,1],
        itemsMobile : [479,1],
        responsiveRefreshRate: 10
        
    });
    owl.on('mousewheel', '.owl-stage', function (e) {
        if (e.deltaY>0) {
            owl.trigger('next.owl');
        } else {
            owl.trigger('prev.owl');
        }
        e.preventDefault();
    });

  

    $('.openModalButton').click(function() {
        var musicianId = $(this).data('id');
        var modal =$("#exampleModal");
        $.ajax({
                url:'/getMusician/'+musicianId , 
                method: 'GET',
                data: { id: musicianId },
                success: function(response) {   
                    console.log(response); 
                    $("#titleText").text(response[0].name);       
                    $("#roleText").text(response[0].designation);  
                    $("#quoteText").text(response[0].description);  
                    $("#imgText").attr('src', response[0].file);       
                    modal.modal('show');
                },
                error: function(error) {
                console.error('Error fetching sub-categories:', error);           
            }        
        });
    });

    $('.sub-btn').click(function() {
        var mailId = $('#sub-email').val();
        $('#recipient-email').val(mailId);
        
    });

    let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
    
});
document.addEventListener("DOMContentLoaded", function() {

    var currentPageUrl = window.location.pathname;
    var isScrollEnabled = true;

    $("#about-us").click(function(e) {
        e.preventDefault(); // Prevent the default behavior of the link
        e.stopPropagation();

        var subMenu = $("#sub-menu");
        var aboutDiv = $("#content-div");

        if (subMenu.is(":visible")) {
            subMenu.hide();
            aboutDiv.removeClass("blurred");

            // Toggle scrolling
            toggleScroll();
        } else {
            subMenu.css("display", "flex");
            aboutDiv.addClass("blurred");

            // Toggle scrolling
            toggleScroll();
        }
    });

    function toggleScroll() {
        var aboutDiv = $("#content-div");
        if (isScrollEnabled) {
            // Disable scrolling
            $('html, body').css({
                'overflow': 'hidden'
               /* 'height': '100%'*/
            });
           // aboutDiv.css('min-height', '100vh');
        } else {
            // Enable scrolling
            $('html, body').css({
                'overflow': 'auto'
               /* 'height': 'auto'*/
            });
        }
       // aboutDiv.css('min-height', '');
        // Toggle the scroll state
        isScrollEnabled = !isScrollEnabled;
    }

    $(document).click(function(e) {
        var subMenu = $("#sub-menu");
        var aboutDiv = $("#content-div");

        if (!$(e.target).closest('#about-us').length && !$(e.target).closest('#sub-menu').length) {
            if (subMenu.is(":visible")) {
                subMenu.hide();
                aboutDiv.removeClass("blurred");

                // Enable scrolling
                toggleScroll();
            }
        }
    });

    
    var accordionButtons = document.querySelectorAll('.abt-accordion');

    
    accordionButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            
            var accordion = button.closest('.accordion');

            
            var collapses = accordion.querySelectorAll('.collapse');

            
            collapses.forEach(function(collapse) {
                collapse.classList.remove('show');
                
            });
            accordionButtons.forEach(function (otherButton) {
                otherButton.classList.remove('shadow-none');
                otherButton.classList.add('collapsed');
            });
            
            if (button.classList.contains('collapsed')) {
                var targetCollapseId = button.getAttribute('data-bs-target').substring(1);
                var targetCollapse = document.getElementById(targetCollapseId);
                targetCollapse.classList.add('show');
                button.classList.add('shadow-none');
                
                button.classList.remove('collapsed');
            } else {
               
                button.classList.add('collapsed');
                
                button.classList.remove('shadow-none');
            }
        });
    });
    var currentDate = new Date();
    
    // Get the current month index (0-based)
    var currentMonthIndex = currentDate.getMonth();   
    var months = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];
    // Dynamically set the accordion title to the current month
    var accordionTitle = document.querySelector("#monthwise button");       
    accordionTitle.textContent = months[currentMonthIndex] + " " + currentDate.getFullYear();
    
    var isMonthContainerVisible = false;

    $('#toggleMonth').on('click', function () {   
        isMonthContainerVisible = !isMonthContainerVisible;
        $('#calendarmnth').toggleClass('show', isMonthContainerVisible);
        /*if(isMonthContainerVisible){
            $('#eventBlurDiv').css('filter','blur(5px)');
        }else{
            $('#eventBlurDiv').css('filter','none');
        }*/
    });

    $('.calendar-mnth-btn').click(function (e) {
        e.stopPropagation(); 
        var selectedMonth = $(this).data('month');
        getEventsByMonth(selectedMonth);
        $('#calendarmnth').removeClass('show');            
            // Remove blur on #eventBlurDiv
            $('#eventBlurDiv').css('filter','none');
            isMonthContainerVisible = false;
    });

    // Close #calendarmnth and remove blur when clicking outside of it
    $(document).on('click', function (e) {
        if (!$(e.target).closest('#calendarmnth').length && isMonthContainerVisible) {
            $('#calendarmnth').removeClass('show');        
            isMonthContainerVisible = true;
        }
    });  
    $('.type_menu').on('click', function(event) {
        event.preventDefault();         
        var eventType = $(this).data('event-type');       
        filterEvents(eventType,'event_type')
        
    });  
    $('.genre_menu').on('click', function(event) {
        event.preventDefault();         
        var eventType = $(this).data('genre-type');       
        filterEvents(eventType,'genre')
        
    });   
    $('.season_menu').on('click', function(event) {
        event.preventDefault();         
        var eventType = $(this).data('season-type');       
        filterEvents(eventType,'season')
        
    });  
});
function filterEvents(eventType, filter)
{
    var token = $('meta[name="csrf-token"]').attr('content');
    var eventDate = $("#toggleMonth").text();
    var dateArray = eventDate.split(' ');
    var month = dateArray[0];  
    var year = dateArray[1];
    var monthNumber = new Date(`${month} 1, 2000`).getMonth() + 1;    
    $.ajax({
        url: '/getEventsByFilter',
        method: 'POST',
        dataType: 'json',
        data : {
            filterBy : eventType,
            filter: filter,
            month: monthNumber,
            year: year,
            _token: token
        },
        success: function(data) {  
            $('#eventsContainer').empty();
            eventHtml(data);         
            console.log(data);           
            
            
        },
        error: function(error) {
            console.error('Error fetching live event data:', error);
        }
    });
}

function subscribe() {
    var email = $('input[name="recipient-email"]').val();
    var name = $('input[name="recipient-name"]').val();    
    var token = $('meta[name="csrf-token"]').attr('content');
    var modal = $("#mailModal");
    if (validateEmail(email)) {
        // console.log("Valid email address");  
        modal.modal('show');              
        if(email !== ''){
            $.ajax({
                type: 'POST',
                url: '/save-subscribe',
                data: {
                    email: email,
                    name: name,
                    _token: token
                },
                success: function(response) {
                    console.log(response);
                    $("#successAlert").css('display','block');
                    modal.modal('hide');
                    $("#sub-email").val('');
                    var emailInput = document.querySelector('input[name="recipient-email"]');
                    emailInput.value = null;
                    $("#recipient-name").val('');
                    
                    toastr.success(message, 'Success');
                },
                error: function(error) {
                    toastr.error(message, 'Error');
                }
            });
        }
    } else {
        toastr.error(message, 'Error');
    }
}
function openMailModal(){
    var email = $("#sub-email").val();
    if (validateEmail(email)) {               
        checkEmailExists(email);       
    } else {
        $('.invalidEmailAlert').text('Invalid Email Address !!');
    }
}
function validateEmail(email) {
    // Regular expression for a basic email validation
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function checkEmailExists(email){
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '/subscribers/checkEmailExists',
        method: 'POST',
        dataType: 'json',
        data : {
             email: email,        
             _token: token    
        },
        success: function(data) {
            if(data.message == "true"){
                $('.invalidEmailAlert').text('Email Already Subscribed !!'); 
            }
            else{
                $('.invalidEmailAlert').text('');
                $('#mailModal').modal('show');
            }
               
        },
        error: function(error) {
            console.error('Error fetching live event data:', error);
        }
    });
}
function getEventsByMonth(selectedMonth){    
    $.ajax({
        url: '/getEventsByMonth/'+selectedMonth,
        type: 'GET',  
        dataType: 'json',        
        success: function(data) {
            $('#eventsContainer').empty();
            var currentYear = new Date().getFullYear();
            var monthObject = new Date(2024, selectedMonth - 1, 1);                
            var selectedMonthName = monthObject.toLocaleString('default', { month: 'long' });
            // Set the accordionTitle outside the loop
            var accordionTitle = document.querySelector("#monthwise button");
            accordionTitle.textContent = selectedMonthName + " " + currentYear;
            eventHtml(data);            
        },
        error: function(error) {
            console.error('Error:', error);
        }
    });
}
 function eventHtml(data){    
    if(data.events.length > 0) {
        data.events.forEach(function(event) {
        var dateObject = new Date(event.event_date);                 
        
        var timeString = dateObject.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: false });
        var eventHtml = '<div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">' +
                            '<div class="card calen-card">' +
                                '<div class="card-body p-0">' +
                                    '<a href="'+/events/+event.slug + '" class="stretched-link"></a>'+
                                    '<h4 class="card-title calen-event-title">' + dateObject.getDate() + '</h4>' +
                                    '<div class="calen-card-text">' +
                                        '<p class="calen-card-text-p">' + event.description + '</p>' +
                                        '<div class="calen-card-dwn-text">' +
                                            '<div class="float-start">' + event.venue + '</div>' +
                                            '<div class="float-end"><i class="fa fa-clock-o"></i>' + timeString + ' GST</div>' +
                                        '</div>' +
                                    '</div>' +
                                    '<hr class="calen-card-dwn-line">' +
                                    '<div class="calendr-foot-img">' +
                                        '<img class="card-img-bottom w-100 h-100" src="' + event.image + '" alt="Card image">' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>';

                // Append the eventHtml to #eventsContainer
                $('#eventsContainer').append(eventHtml);
            });
        }
        else {
            // If no events, display a message
            $('#eventsContainer').html('<div class="col-12 text-center mt-4">' +
                        '<h3>No events for this month.</h3>' +
                        '</div>');
        }   
    }



