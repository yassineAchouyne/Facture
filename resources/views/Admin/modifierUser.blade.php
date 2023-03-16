@extends('layouts.index')

@section('style')

<style>
    .form-control:focus {
        border-color: none !important;
        box-shadow: none !important;
    }

    .upload {
        width: 100px;
        position: relative;
        margin: auto;
    }

    .upload img {
        border-radius: 50%;
        border: 6px solid #eaeaea;
    }

    .upload .round {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 32px;
        height: 32px;
        line-height: 33px;
        text-align: center;
        border-radius: 50%;
        overflow: hidden;
    }

    .upload .round input[type="file"] {
        position: absolute;
        transform: scale(2);
        opacity: 0;
    }

    input[type=file]::-webkit-file-upload-button {
        cursor: pointer;
    }

    /* .form-control:focus {
  border-color: #6265e4 !important;
  box-shadow: 0 0 5px rgba(98, 101, 228, 1) !important;
} */
</style>

@endsection

@section('content')
<section>
    <form action="/profile/{{$user->id}}" method="post" class="container py-5" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <div class="upload">
                            <div class=" d-flex justify-content-center">
                                <img src="{{ asset('storage/avatars/'.$user->avatar) }}" id="image" width=158 height=158 alt="">
                            </div>
                            <div class="round bg-primary">
                                <input onchange="previewPicture(this)" name="avatar" accept=".jpg, .png, .gif" id="file" type="file">
                                <i class="bi bi-pencil-square" style="color: #fff;"></i>
                            </div>
                        </div>
                        <h5 class="my-3">{{$user->name}}</h5>
                        <button type="submit" href="/profile/{{$user->id}}/edit" class="btn btn-outline-primary ms-1">Enregistrer</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Com Complet</p>
                            </div>
                            <div class="col-sm-9">
                                <input class="text-muted mb-0 border-0  form-control" name="name" value="{{$user->name}}" />
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <input class="text-muted mb-0 border-0  form-control " name="email" value="{{$user->email}}" />
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Numéro de Téléphone</p>
                            </div>
                            <div class="col-sm-9">
                                <input class="text-muted mb-0 border-0  form-control " name="tel" value="{{$user->tel}}" />
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Address</p>
                            </div>
                            <div class="col-sm-9">
                                <input class="text-muted mb-0 border-0  form-control " name="adresse" value="{{$user->adresse}}" />
                            </div>
                        </div>

                        @if(!$user->societe)
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Code Postal</p>
                            </div>
                            <div class="col-sm-9">
                                <input class="text-muted mb-0 border-0  form-control " name="codePostal" value="{{$societe->codePostal}}" />
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Ville</p>
                            </div>
                            <div class="col-sm-9">
                                <input class="text-muted mb-0 border-0  form-control " name="ville" value="{{$societe->ville}}" />
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Pays</p>
                            </div>
                            <div class="col-sm-9">
                                <input class="text-muted mb-0 border-0  form-control " name="pays" value="{{$societe->pays}}" />
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">CNIE</p>
                            </div>
                            <div class="col-sm-9">
                                <input class="text-muted mb-0 border-0  form-control " name="cnie" value="{{$societe->cnie}}" />
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">ICE</p>
                            </div>
                            <div class="col-sm-9">
                                <input class="text-muted mb-0 border-0  form-control " name="ICF" value="{{$societe->ICF}}" />
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">IF</p>
                            </div>
                            <div class="col-sm-9">
                                <input class="text-muted mb-0 border-0  form-control " name="IF" value="{{$societe->IF}}" />
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Taxe</p>
                            </div>
                            <div class="col-sm-9">
                                <input class="text-muted mb-0 border-0  form-control " name="taxe" value="{{$societe->taxe}}" />
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection

@section('script')

<script type="text/javascript">
    var image = document.getElementById("image");

    var previewPicture = function(e) {

        const [picture] = e.files
        if (picture) {
            image.src = URL.createObjectURL(picture)
        }
        console.log(picture)
    }
</script>
@endsection