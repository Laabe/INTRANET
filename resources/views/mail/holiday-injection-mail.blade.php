<!DOCTYPE html>
<html>

<head>
    <title>{{ __('Holiday Injection') }}</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.5;
            color: #333333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #CCCCCC;
            background-color: #FFFFFF;
        }

        h1 {
            font-size: 28px;
            margin-top: 0;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 20px;
        }

        .signature {
            margin-top: 40px;
            border-top: 1px solid #CCCCCC;
            padding-top: 20px;
            text-align: center;
        }

        .signature p {
            margin-bottom: 0;
        }

        .signature img {
            max-width: 200px;
            height: auto;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h4>{{ __('Hi,') }}</h4>
        <p>{{ __('We inform you that the day of holiday you worked in was added to your holidays balance.') }}</p>
        <p>{{ __('Thank you for your services.') }}</p>

        <div class="signature">
            <p>Intranet</p>
            <p>NCC Casablanca</p>
            <p>2, Rue Abou Assalt Andaloussi
                Angle Bd Brahim Roudani, Maârif
                20 330 Casablanca</p>
            <p>Tél. : + 212 (0) 522 64 66 46</p>
            <p>Fax : + 212 (0) 522 94 02 27</p>
            <p>E-Mail : recrutement@cbiscom.com</p>
            <p>Web : www.cbiscom.com</p>
            <img src="{{ asset('assets/logo/logo.png') }}" alt="Your Company Logo">
        </div>
    </div>
</body>

</html>
