@extends('Core::layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit</div>
                    <div class="card-body">
                        <div class="wrapper">
                            <form method="post">
                                <div class="form-container">
                                <input
                                    type="text"
                                    value="{{$todo[0]['content']}}"
                                    name="content"
                                    class="input-text"
                                />
                                <input type="submit" value="Submit" class="input-submit"/>
                                </div>
                                <input style="height: 20px; width: 20px; margin-top: 30px;" type="radio" id="done" name="status" value="true"/>
                                <label for="done">Done</label>

                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

