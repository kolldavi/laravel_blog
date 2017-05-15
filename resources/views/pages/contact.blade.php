@extends('main')
@section('title')
| Contact
@endsection
@section('stylesheets')
  {!!Html::style('css/parsley.css') !!}
@endsection
@section('content')
      <div class="row">
        <div class="col-md-12">
          <h1>Contact Me</h1>
          <hr>
          <form data-parsley-validate>
            <div class="form-group",>
              <label name="email">Email:</label>
              <input id="email" name="email" type="email" class="form-control" data-parsley-required ="true" required>
            </div>

            <div class="form-group">
              <label name="subject">Subject:</label>
              <input id="subject" name="subject" class="form-control" data-parsley-required="true"required maxlength="100">
            </div>

            <div class="form-group">
              <label name="message">Message:</label>
              <textarea id="message" name="message" class="form-control" placeholder="Type your message here.." data-parsley-required="true" required></textarea>
            </div>

            <input type="submit" value="Send Message" class="btn btn-success">
          </form>
        </div>
@endsection
@section('scripts')
  {!!Html::script('js/parsley.min.js') !!}
@endsection