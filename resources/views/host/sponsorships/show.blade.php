<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css">


    <!-- Usando Vite -->
    @vite(['resources/js/pay.js'])
</head>

<body>
    <div class="container p-0">
        <div class="card px-4">
            <p class="h8 py-3">Payment Details</p>
            <div class="row gx-3">
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Person Name</p>
                        <input class="form-control mb-3" type="text" placeholder="Name"
                            value="{{ Auth::user()->name }} {{ Auth::user()->surname }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Card Number</p>
                        <input class="form-control mb-3 @error('cardNumberInput') is-invalid @enderror" type="text"
                            name="cardNumberInput" placeholder="1234 5678 4356" id="cardNumberInput" required
                            minlength="12" maxlength="12">
                        @error('cardNumberInput')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Expiry</p>
                        <input class="form-control mb-3" type="text" placeholder="MM/YYYY" id="expiryInput" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">CVV/CVC</p>
                        <input class="form-control mb-3 pt-2 " type="password" placeholder="***" id="cvvInput"
                            required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="btn btn-primary mb-3" id="paymentButton">
                        <span class="ps-3">{{ $sponsorship->price }} &euro;</span>
                        <span class="fas fa-arrow-right"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" data-bs-backdrop="static"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body d-flex justify-content-center align-items-center flex-column">
                    <div class="px-4 py-3 fs-2 rounded-circle bg-success text-white"><i class="fas fa-check"></i>
                    </div>
                    <p class="m-0 fw-bold text-uppercase">The payment has been processed successfully.</p>

                </div>
            </div>
        </div>
    </div>

    <!-- Librerie JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Tuo script personalizzato -->
    <script>
        document.getElementById('paymentButton').addEventListener('click', function() {
            var cardNumber = document.getElementById('cardNumberInput').value;
            var expiry = document.getElementById('expiryInput').value;
            var cvv = document.getElementById('cvvInput').value;

            // Controlla la validità dei campi
            if (cardNumber.trim() === '' || expiry.trim() === '' || cvv.trim() === '') {
                alert('Si prega di compilare tutti i campi');
                return;
            }

            // Altri controlli specifici (es. validità carta di credito)

            // Invia la richiesta al server per aggiungere la sponsorizzazione
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/host/sponsorship/add');
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Sponsorizzazione aggiunta con successo, puoi mostrare il modal
                    var modal = new bootstrap.Modal(document.getElementById('paymentModal'));
                    modal.show();

                    // Reindirizza dopo 2 secondi
                    setTimeout(function() {
                        window.location.href = "{{ route('host.apartments.index') }}";
                    }, 2000);
                } else {
                    // La richiesta ha fallito, gestisci l'errore
                    alert('Errore durante l\'aggiunta della sponsorizzazione. Si prega di riprovare.');
                }
            };
            xhr.send(JSON.stringify({
                cardNumber: cardNumber,
                expiry: expiry,
                cvv: cvv
            }));
        });
    </script>

</body>

</html>
