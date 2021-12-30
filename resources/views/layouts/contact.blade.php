@extends('welcome')

@section('title')
Contact
@endsection

@section('search')
<div class="d-flex align-items-center justify-content-center">
    <div class="contact">
        <div class="contact_title pb-2">Get in touch</div>
        <div class="contact_subtitle header">any query?</div>
    </div>
</div>
@endsection

@section('content')
<section>
    <div class="py-4">
        <div class="container">
            <div class="row contact_content">
                <div class="col-lg-5">
                    <div class="contact_info">
                        <div class="contact_info_box">i</div>
                        <div class="contact_info_container">
                            <div class="contact_info_content">
                                <ul>
                                    <li>Address: 1481 Creekside Lane Avila Beach, CA 93424</li>
                                    <li><i class="bi bi-telephone-fill"></i> <span>+254 721 562 127<span></li>
                                    <li><i class="bi bi-envelope-fill"></i> <span>mail@bookyourtrain.com</span></li>
                                </ul>
                            </div>
                            <div class="contact_info_social">
                                <ul>
                                    <li><i class="fbi bi-instagram" aria-hidden="true"></i></li>
                                    <li><i class="bi bi-linkedin" aria-hidden="true"></i></li>
                                    <li><i class="bi bi-facebook" aria-hidden="true"></i></li>
                                    <li><i class="bi bi-twitter" aria-hidden="true"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="contact_form_container">
                        <form action="{{route('contact.store')}}" method="POST" id="contact_form" class="clearfix">
                            @csrf
                            <input id="contact_input_name" class="contact_input contact_input_name" type="text" placeholder="Name" required="required" data-error="Name is required." />
                            <input id="contact_input_email" class="contact_input contact_input_email" type="text" placeholder="E-mail" required="required" data-error="E-mail is required." />
                            <input id="contact_input_subject" class="contact_input contact_input_subject" type="text" placeholder="Subject" />
                            <textarea id="contact_input_message" class="contact_message_input contact_input_message" name="message" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
                            <button id="contact_send_btn" type="submit" class="contact_send_btn trans_200" value="Submit">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection