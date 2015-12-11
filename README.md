# WucdbmEpayBundle

Usage: 
- Register a service that extends the Wucdbm\Component\Epay\Client\ClientOptions class
- Register a service that implements the Wucdbm\Component\Epay\Client\PaymentHandlerInterface interface
- in your config.yml add:
```
wucdbm_epay:
    client_options: "YourOptionsServiceId"
    client_handler: "YourHandlerServiceId"
```
- Add new Wucdbm\Bundle\EpayBundle\WucdbmEpayBundle(), to your AppKernel >> A F T E R << the bundle that registers
- Optionally, override the wucdbm_epay.receive_url parameter (defaults to receive)
- Mouting the @WucdbmEpayBundle/Resources/config/routing.yml file in your routing.yml
```
wucdbm_epay:
    resource: "@WucdbmEpayBundle/Resources/config/routing.yml"
    prefix: /payments/epay
```
- The receive address will now be /payments/epay/%wucdbm_epay.receive_url% - /payments/epay/receive by default. This gives you the full flexibility to alter the URL at which you receive the payments.
- Use the `app/console wucdbm_epay:get_receive_path` command to make sure you have the correct receive path
- Go to epay.bg and contact their support asking them to set your correct receive URL