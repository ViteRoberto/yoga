<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Slides
      <small>Control de Slides</small>
    </h1>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Principal</a></li>
            <li><a href="#tab_2" data-toggle="tab">Studio</a></li>
            <li><a href="#tab_3" data-toggle="tab">Tienda</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
              <div class="row">
                <div class="col-md-7">
                  <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                      <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalAgregarSlidePrincipal">Agregar Slide Principal</button>
                    </div>
                    <div class="box-body">
                      <table class="table table-bordered table-striped dt-responsive">
                        <tbody>
                          <?php 

                            $slides = ControladorSlides::ctrMostrarSlides();
                            $olo = 'kk';

                            foreach ($slides as $key => $value) {
                              echo '<tr>
                                      <td><button class="btn btn-success btn-xs">orale</button></td>
                                      <td><img src="'.$value['url'].'" class="thumbnail" width="150px"></td>
                                      <td>'.$value['titulo'].'</td>
                                      <td>
                                        <div class="btn-group">
                                          <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                          <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                        </div>
                                      </td>
                                    </tr>';
                            }

                           ?>
                        </tbody>
                      </table>
                    </div>
                  </div>   
                </div>
                <div class="col-md-5">
                  <div class="box-body">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                      </ol>
                      <div class="carousel-inner">
                        <?php 

                          $inicial = 0;
                          foreach ($slides as $key => $value) {
                            if($inicial == 0){
                              $active = 'active';
                              $inicial = 1;
                            }else{
                              $active = '';
                            }
                            echo '<div class="item '.$active.'">
                                    <img src="'.$value['url'].'">
                                    <div class="carousel-caption">
                                      '.$value['titulo'].'
                                    </div>
                                  </div>';
                          }
                          
                         ?>
                      </div>
                      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="fa fa-angle-left"></span>
                      </a>
                      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="fa fa-angle-right"></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab_2">

            </div>
            <div class="tab-pane" id="tab_3">

            </div>
          </div>
        </div>        
      </div>
    </div>  
  </section>
</div>

<div class="modal fade" id="modalAgregarSlidePrincipal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header bg-primary text-center">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agredar Slide Principal</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="row"> 
              <div class="col-md-10 col-md-offset-1">
                <div class="form-group text-center">
                  <div class="subirFoto">
                    <input type="file" class="nuevaFoto" id="nuevoUrlSlide" name="nuevoUrlSlide">
                  </div>
                  <p class="help-block">Peso máximo de 2MB</p>
                  <img src="vistas/img/slides/slide0.png" class="thumbnail previsualizar" width="100px">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="form-group text-center">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                    <input type="text" class="form-control" id="nuevoTituloSlide" name="nuevoTituloSlide" placeholder="Título que llevará el Slide...">
                  </div>
                </div>
              </div>                
            </div>
            <div class="row">            
              <div class="col-md-10 col-md-offset-1">
                <div class="form-group text-center">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-link"></i></span>
                    <input type="text" class="form-control" id="nuevoLinkSlide" name="nuevoLinkSlide" placeholder="Enlace al darle click...">
                    <input type="text" id="nuevoTipoSlide" name="nuevoTipoSlide" style="display:none;" value="Principal">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-block">Guardar Slide</button>
        </div>
        <?php 
          $subirSlide = new ControladorSlides();
          $subirSlide -> ctrSubirSlide();
         ?>
      </form>
    </div>
  </div>
</div>