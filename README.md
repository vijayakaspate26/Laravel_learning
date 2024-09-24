<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## The Ticket Booking System




<p>to run this project  required the following :</p>
<ul>
    <Li>Xammp Server  installed in you pc</Li>
    <li>Composer   installed in you pc</li>
    <li>to create the project run the command : composer create-project laravel/laravel booking-system </li>
    <li> Command : php artisan serve then the link is open (http://127.0.0.1:8000/) </li>
    <li> the page of laravel is open then register if your new for this site , then login </li>
    <li>after login your are able to see the form for booking system filled the form and then it will redirect to bookinglist page</li>
                            
    
</ul>
<h5>Controller</h5>
<P>Controller is used here is TicketController were we perform all task regarding the Booking Form</P>
<h5>Models</h5>
<p>We have Destination,Trip,Seat , BookingDetail Models to manage all Task Regarding the Databases</p>
<h5>create the database </h5>
<p> 1. destination table : to store the destination name </p>
<p> 1. trips table : to store the trip data, as id, trip name as start to end point, prize as per trip  </p>
<p> 1. seat table : to store the seat prize based on type single or double </p>
<p> 1. bookingdetails table : to store all the info from from recorder here</p>
<h5>Routes</h5>
<p>Web.php File have mentions all routes for this project</p>





