
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'

});


Stripe.setPublishableKey('pk_test_6VtotqOL5ujeGxOo2uizoKe6');

var $form = $('#checkout-form')

$form.submit(function(event){
  $('#charge-error').addClass('hidden');
  $form.find('button').prop('disabled', true)

  Stripe.card.createToken({
    number: $('#card-number').val(),
    cvc: $('#card-cvc').val(),
    exp_month: $('#card-expiry-month').val(),
    exp_year: $('#card-expiry-year').val(),
    name: $('#card-name').val()
  }, stripeResponseHandler);
  return false;
});

function stripeResponseHandler(status, response){
    if (response.error) {
        $('#charge-error').removeClass('hidden');
        $('#charge-error').text(response.error.message);
        $form.find('button').prop('disabled', false)
    } else{
        var token = response.id;
        $form.append($('<input type = "hidden", name = "stripeToken" />').val(token));

        // submit the form:
        $form.get(0).submit()
    }
}
