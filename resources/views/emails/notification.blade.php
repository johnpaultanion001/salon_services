
@component('mail::message')
<style>
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
    <img src="https://icon-library.com/images/local-government-icon/local-government-icon-21.jpg" alt="logo" width="100"/>
    <br>
    <br>
        <strong style="font-size: 22px; text-transform: uppercase;">{{ $content['notif'] }}</strong>
    <br>
    <br>
</div>
<b>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</b>



 

@endcomponent
