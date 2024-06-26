<!-- Message will show if user successfully saved in database -->
@if(session()->has('message_success'))
    <div class="alert alert-success" role="alert">
        {{ session ('message_success') }}
    </div>
@endif

<!-- Message will show if there are any invalid value in form -->
@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif