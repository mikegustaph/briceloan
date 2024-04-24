@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Edit Disclosure </h3>
            <div class="col-sm-6">
                @if (session('error'))
                    <div id="flash-message" class="alert alert-fill-danger alert-dismissible" role="alert">
                        <strong>Oohps! </strong>{{ session('error') }}
                    </div>
                @elseif (session('success'))
                    <div id="flash-message" class="alert alert-fill-success alert-dismissible" role="alert">
                        {{ session('success') }}
                    </div>
                    <script>
                        $(document).ready(function() {
                            setTimeout(function() {
                                $('#flash-message').fadeOut('slow');
                                $('#error-message').fadeOut('slow');
                            }, 5000); // Adjust the timeout value (in milliseconds) as needed
                        });
                    </script>
                @endif
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">App Setting</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Disclosure</li>
                </ol>
            </nav>
        </div>
        <!--Row-->
        <div class="row ">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Disclosure Statement</h4>
                        <form action="{{ url('/disclosure_statement/' . $disclosure->id) }}" method="POST"
                            class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group" style="display: none;">
                                <input type="text" name="user" value="{{ Auth::user()->first_name }}"
                                    class="form-control" id="exampleInputName1" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Disclosure Name</label>
                                <input type="text" value="{{ $disclosure->name }}" style="color: white;" name="name"
                                    class="form-control" id="exampleInputName1" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Text Area</label>
                                <textarea value="{{ $disclosure->disclosure_text }}" style="color: white;" name="disclosuretext" class="form-control"
                                    id="" rows="35" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection