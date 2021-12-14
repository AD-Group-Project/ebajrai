<!DOCTYPE html>

<html>

<head>

        <title> E-Bajrai | Edit Profile </title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/astyle.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        
        <style>
            body {
                background-color: #F5F8F2;
                color: darkslategray;
                font-size: 15px;
            }

            .container {
                display: flex;
                justify-content: center;
            }

            .user_card{
                height: 650px;
                width: 600px;
                padding: 20px 80px 20px 80px;
                background-color: white;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                border-radius: 5px;
            }

            .bahagi {
                display: grid;
                grid-template-columns: 140px 350px;
                grid-template-rows: 40px 40px 40px 40px;
                grid-row-gap: 15px;
            }

            .kotak {
                background-color: #f5f4f2;
                width: 85%;
                padding: 10px;
                border: 1px solid gainsboro;
                border-radius: 0.5em;
            }

            button {
                background-color: #53B175;
                color: white;
                border: 2px solid #53B175;
                width: 40%;
                height: 35px;
                border-radius: 10px;
            }
            .col-md-9{
                padding-left: 120px;
            }
        </style>

    </head>

    <body>
        <br><br>
        <div class="container">
            <div class="user_card">

                <h1 style="text-align: center"> Update Profile </h1>
                <hr class="mb-3">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                <form wire:submit.prevent="updateProfile">
                    <div class="col-md-9">
                            @if($newimage)
                                <img src="{{$newimage->temporaryUrl()}}" width="100%" />
                            @elseif($image)
                                <img src="{{asset('images/profile')}}/{{$user->profile->image}}" width="100%" />
                            @else
                                <img src="{{asset('images/profile/default.png')}}" width="100%" />
                            @endif
                            <input type="file" class="form-control" wire:model="newimage"/>
                    </div>
                    <br><br>
                    <div class="bahagi">
                        <div> Full name </div>
                        <input type="text" class="form-control" wire:model="name"/>
                        <div> Email </div>
                        <input type="text" class="form-control" wire:model="email" disabled/>
                        <div> Phone Number </div>
                        <input type="text" class="form-control" wire:model="mobile"/>
                        <div> Address </div>
                        <input type="text" class="form-control" wire:model="address"/>
                    </div><br><br>
                    
                    <div style="display: flex; justify-content: flex-end"><button type="submit"> Update Profile </button></div>
                </form>
            </div>
        </div>
    </body>
</html>