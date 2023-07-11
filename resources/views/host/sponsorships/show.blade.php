@extends('layouts.app')

@section('content')
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-right"> <i class="fa fa-close close" data-dismiss="modal"></i> </div>
                    <div class="tabs mt-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation"> <a class="nav-link active" id="visa-tab"
                                    data-toggle="tab" href="#visa" role="tab" aria-controls="visa"
                                    aria-selected="true"> <img src="https://i.imgur.com/sB4jftM.png" width="80"> </a>
                            </li>
                            <li class="nav-item" role="presentation"> <a class="nav-link" id="paypal-tab" data-toggle="tab"
                                    href="#paypal" role="tab" aria-controls="paypal" aria-selected="false"> <img
                                        src="https://i.imgur.com/yK7EDD1.png" width="80"> </a> </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="visa" role="tabpanel"
                                aria-labelledby="visa-tab">
                                <div class="mt-4 mx-4">
                                    <div class="text-center">
                                        <h5>Credit card</h5>
                                    </div>
                                    <div class="form mt-3">
                                        <div class="inputbox"> <input type="text" name="name" class="form-control"
                                                required="required"> <span>Cardholder Name</span> </div>
                                        <div class="inputbox"> <input type="text" name="name" min="1"
                                                max="999" class="form-control" required="required"> <span>Card
                                                Number</span> <i class="fa fa-eye"></i> </div>
                                        <div class="d-flex flex-row">
                                            <div class="inputbox"> <input type="text" name="name" min="1"
                                                    max="999" class="form-control" required="required">
                                                <span>Expiration Date</span>
                                            </div>
                                            <div class="inputbox"> <input type="text" name="name" min="1"
                                                    max="999" class="form-control" required="required">
                                                <span>CVV</span>
                                            </div>
                                        </div>
                                        <div class="px-5 pay"> <button class="btn btn-success btn-block">Add card</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="paypal" role="tabpanel" aria-labelledby="paypal-tab">
                                <div class="px-5 mt-5">
                                    <div class="inputbox"> <input type="text" name="name" class="form-control"
                                            required="required"> <span>Paypal Email Address</span> </div>
                                    <div class="pay px-5"> <button class="btn btn-primary btn-block">Add paypal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
