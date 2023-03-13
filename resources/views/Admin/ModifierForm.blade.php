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
    <form action="/form/{{$societe->id}}" class="row m-1" method="post" class="container py-5" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <div class="upload">
                        <div class=" d-flex justify-content-center">
                            <img src="{{ asset('storage/logo/'.$societe->logo) }}" id="image" width=158 height=158 alt="">
                        </div>
                        <div class="round bg-primary">
                            <input onchange="previewPicture(this)" name="logo" accept=".jpg, .png, .gif" id="file" type="file">
                            <i class="bi bi-pencil-square" style="color: #fff;"></i>
                        </div>
                    </div>
                    <h5 class="my-3">{{$societe->nomSociete}}</h5>
                    <button type="submit" class="btn btn-outline-primary ms-1">Enregistrer</button>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Nom Socéité</p>
                        </div>
                        <div class="col-sm-9">
                            <input class="text-muted mb-0 border-0  form-control" name="nom" value="{{$societe->nomSociete}}" />
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Address</p>
                        </div>
                        <div class="col-sm-9">
                            <input class="text-muted mb-0 border-0  form-control" name="adresse" value="{{$societe->adresse}}" />
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Code Postal</p>
                        </div>
                        <div class="col-sm-9">
                            <input class="text-muted mb-0 border-0  form-control" name="codePostal" value="{{$societe->codePostal}}" />
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Fax</p>
                        </div>
                        <div class="col-sm-9">
                            <input class="text-muted mb-0 border-0  form-control" name="fax" value="{{$societe->fax}}" />
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Ville</p>
                        </div>
                        <div class="col-sm-9">
                            <input class="text-muted mb-0 border-0  form-control" name="ville" value="{{$societe->ville}}" />
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Pays</p>
                        </div>
                        <div class="col-sm-9">
                            <input class="text-muted mb-0 border-0  form-control" name="pays" value="{{$societe->pays}}" />
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Site Internit</p>
                        </div>
                        <div class="col-sm-9">
                            <input class="text-muted mb-0 border-0  form-control" name="website" value="{{$societe->website}}" />
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">RC</p>
                        </div>
                        <div class="col-sm-9">
                            <input class="text-muted mb-0 border-0  form-control" name="RC" value="{{$societe->RC}}" />
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">IF</p>
                        </div>
                        <div class="col-sm-9">
                            <input class="text-muted mb-0 border-0  form-control" name="IF" value="{{$societe->IF}}" />
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Patent</p>
                        </div>
                        <div class="col-sm-9">
                            <input class="text-muted mb-0 border-0  form-control" name="patent" value="{{$societe->patent}}" />
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">CNSS</p>
                        </div>
                        <div class="col-sm-9">
                            <input class="text-muted mb-0 border-0  form-control" name="cnss" value="{{$societe->cnss}}" />
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">ICF</p>
                        </div>
                        <div class="col-sm-9">
                            <input class="text-muted mb-0 border-0  form-control" name="ICF" value="{{$societe->ICF}}" />
                        </div>
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