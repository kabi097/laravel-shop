@extends('layouts.default')

@section('content')
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-9">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title font-weight-bold border-bottom pb-2">Zamówienie</h4>
                            <div class="card-text d-flex align-items-start">
                                <img src="https://via.placeholder.com/100x100" class="img-fluid rounded mr-3 py-2">
                                <div class="w-100 border-bottom py-2">
                                    <h4 class="font-weight-bold">Microsoft Office 2007</h4>
                                    <p>Cena: <b>140 zł</b></p>
                                    <div class="d-inline-block mb-1">Ilość: <input type="number" class="form-control" min=1 max=100 value=1 aria-describedby="helpId" placeholder="Ilość"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card my-3">
                        <div class="card-body">
                            <h4 class="card-title font-weight-bold border-bottom pb-2">Płatność i dostawa</h4>
                            <p class="card-text">Text</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title font-weight-bold border-bottom pb-2">Podsumowanie</h4>
                        <div class="card-text my-2">
                            <table class="table table-borderless mb-2">
                                <tr>
                                    <td>Ilość</td>
                                    <td class="font-weight-bold">4</td>
                                </tr>
                                <tr>
                                    <td>Razem</td>
                                    <td class="font-weight-bold">420 zł</td>
                                </tr>
                                <tr>
                                    <td>Metoda płatności</td>
                                    <td class="font-weight-bold">MasterCard</td>
                                </tr>
                            </table>
                            <button type="submit" name="" id="" class="btn btn-block btn-success" btn-lg btn-block">
                                Kupuję i płacę
                            </button>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
