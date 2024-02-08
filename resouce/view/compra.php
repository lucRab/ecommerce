<?php $this->layout('master')?>

<div class="container mt-6">
    <div class="column">
        <div class="box">
            <nav class="navbar">
                <div class="navbar-brand">
                    <div class="navbar-item">
                        Produto
                    </div>
                </div>
                <div class="navbar-end">
                    <div class="columns">
                        <div class="column">
                            <div class="navbar-item">
                                | Quantidade
                            </div>
                        </div>
                        <div class="column">
                            <div class="navbar-item">
                                | Preço Unitario
                            </div>
                        </div>
                        <div class="column">
                            <div class="navbar-item">
                                | Preço Total
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="columns">
                <div class="column is-two-thirds">     
                    <figure class="image is-96x96 ml-5">
                      <img src="accets/img/celular.png">
                    </figure>
                    CELULAR GAMER 1.0
                </div>
                <div class="column">
                    <div class="columns">
                        <div class="column is-3">
                           <input type="number" class="input is-small">
                        </div>
                        <div class="column">
                            R$ 30,00
                        </div>
                        <div class="column">
                            R$ 90,00
                        </div>
                    </div>
                    <button class="button is-white" id="btn">
                      Remover
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="column">
        <div class="box">
            <div class="columns" >
                <div class="column">
                    <button class="button is-primary is-medium" id="btn">
                      Comprar
                    </button>
                </div>
                <div class="column">
                    <div class="title is-size-4">
                        VALOR TOTAL: 90,00
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>