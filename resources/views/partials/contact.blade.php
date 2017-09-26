    <section id="get-in-touch">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Contacto</h2>
                <p class="text-center wow fadeInDown">Podemos ayudarte</p>
            </div>
        </div>
    </section>

    <section id="contact">
        <div id="google-map" style="height:650px" data-latitude="24.022377" data-longitude="-104.663944"></div>
        <div class="container-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8">
                        <div class="contact-form">
                            <h3>Contacto</h3>

                            <address>
                                Calle Carlos León de la Pena 507, <br>
                                Zona Centro, 34000 Durango, Dgo., México <br>
                                Lunes a viernes 10:00 am a 2:00 pm <br>
                                Y de 4:00 pm a 8:00 pm <br>
                              <abbr title="Phone">Tel:</abbr> (618) 825-4121
                            </address>

                            @include('alerts.error')
                            @include('alerts.success')
                            @include('alerts.warning')

                            {!! Form::open([ 'url' => 'send-email', 'method' => 'POST']) !!}

                                <div class="form-group">
                                    {!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Nombre', 'required']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::email('email', null, ['class' => 'form-control','placeholder' => 'Correo electrónico', 'required']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::text('subject', null, ['class' => 'form-control','placeholder' => 'Asunto', 'required']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::textarea('message', null, ['class' => 'form-control','placeholder' => 'Mensaje', 'required']) !!}

                                <button type="submit" class="btn btn-primary">Enviar Mensaje</button>

                           {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>