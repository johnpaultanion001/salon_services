
@component('mail::message')
<style>
    .msg{
        color: #111;
        font-size: 14px;
        padding: 5px;
        font-family: Arial, Helvetica, sans-serif;
    }
    .center {
            margin: auto;
            width: 100%;
            text-align: center;
            text-align: center;
            color: gray;
        }
    hr{
        border-top: .1em solid whitesmoke;
    }
</style>

<div class="center">
        <strong style="font-size: 22px; text-transform: uppercase;">{{ $content['notif'] }}</strong>
    <br>
    <br>
</div>

<div class="msg">
    @if($content['msg'] == 'appointment_approved')

        Appointment ID: {{ $content['appointment_id'] }}

        Service: {{ $content['service'] }}

        Staff: {{ $content['staff'] }}

        Appointment Date: {{ $content['appointment_date'] }}

        Appointment Time: {{ $content['appointment_time'] }}

        For any feedback or concerns, feel free to message us on the test.com or you can also email us if you need any assistance: test@gmail.com
    @elseif($content['msg'] == 'appointment_completed')
        Congratulations! Your appointment request has been completed. For any feedback or concerns, feel free to message us on the test.com or you can also email us if you need any assistance: test@gmail.com
    @elseif($content['msg'] == 'appointment_declined')
    Possible reasons on why appointment has been declined

        1. The screenshot or proof of payment you have submitted
        does not match your information.

        2. The screenshot or proof of payment you submitted is
        blurry or not readable. Please make sure that screenshot or
        image is clear and all information are visible.

        3. You have paid an incorrect/insufficient amount. Please
        make sure to pay the correct price of document indicated.

    @elseif($content['msg'] == 'send_msg')
    Name: {{ $content['name'] }}
        Email: {{ $content['email'] }}

        {{ $content['body'] }}
    @endif



</div>


@endcomponent
