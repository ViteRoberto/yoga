<div class="content-wrapper">

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
                      <button class="btn btn-primary btn-block btnAgregarSlide" data-toggle="modal" data-target="#modalAgregarSlidePrincipal">Agregar Slide Principal</button>
                    </div>
                    <div class="box-body">
                      <table class="table table-bordered table-striped dt-responsive">
                        <tbody>
                          <?php 

                            $slides = ControladorSlides::ctrMostrarSlides();

                            foreach ($slides as $key => $value) {
                              if($value['activo'] == 1){
                                $activo = '<button class="btn btn-success">ACTIVADO</button>';
                              }else{
                                $activo = '<button class="btn btn-danger">DESACTIVADO</button>';
                              }
                              echo '<tr class="principal-'.$value['idSlide'].'">
                                      <td>'.$activo.'</td>
                                      <td><img src="'.$value['url'].'" class="thumbnail" width="150px"></td>
                                      <td>'.$value['titulo'].'</td>
                                      <td>
                                        <div class="btn-group">
                                          <button class="btn btn-warning btnEditarSlide" idSlide="'.$value['idSlide'].'" titulo="'.$value['titulo'].'" link="'.$value['link'].'" url="'.$value['url'].'" data-toggle="modal" data-target="#modalEditarSlidePrincipal"><i class="fa fa-pencil"></i></button>
                                          <button class="btn btn-danger btnBorrarSlide" idSlide="'.$value['idSlide'].'" url="'.$value['url'].'"><i class="fa fa-times"></i></button>
                                        </div>
                                      </td>
                                    </tr>';
                            }
                            echo '<input type="text" id="ultimoIdPrincipal" name="ultimoIdPrincipal" style="display:none;" value="'.$value['idSlide'].'">';
                           ?>
                        </tbody>
                      </table>
                    </div>
                  </div>   
                </div>
                <div class="col-md-5">
                  <div class="box-body">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
<!--                       <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                      </ol> -->
                      <div class="carousel-inner" id="slidesPrincipal">
                        <?php 

                          $inicial = 0;
                          foreach ($slides as $key => $value) {
                            if($inicial == 0){
                              $active = 'active';
                              $inicial = 1;
                            }else{
                              $active = '';
                            }
                            echo '<div class="principal-'.$value['idSlide'].' item '.$active.'">
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

<!-- MODAL AGREGAR SLIDE -->
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
                    <img src="vistas/img/slides/0.png" class="thumbnail previsualizar" width="100px">
                    
                  </div>
                  <p class="help-block">Peso máximo de 2MB</p>
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
                    <input type="text" id="ultimoIdPrincipalModal" name="ultimoIdPrincipalModal" style="display: none;">
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

<!-- MODAL EDITAR SLIDE -->
<div class="modal fade" id="modalEditarSlidePrincipal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header bg-primary text-center">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Slide Principal</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="row"> 
              <div class="col-md-10 col-md-offset-1">
                <div class="form-group text-center">
                  <div class="subirFoto">
                    <input type="file" class="nuevaFoto" id="editarUrlSlide" name="editarUrlSlide">
                    <input type="hidden" id="editarUrlSlideActual" name="editarUrlSlideActual">
                    <img src="vistas/img/slides/0.png" class="thumbnail previsualizar" width="100px" id="mostrarUrlSlide">                    
                  </div>
                  <p class="help-block">Peso máximo de 2MB</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="form-group text-center">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                    <input type="text" id="editarIdSlide" name="editarIdSlide" style="display:none;">
                    <input type="text" class="form-control" id="editarTituloSlide" name="editarTituloSlide" placeholder="Título que llevará el Slide...">
                  </div>
                </div>
              </div>                
            </div>
            <div class="row">            
              <div class="col-md-10 col-md-offset-1">
                <div class="form-group text-center">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-link"></i></span>
                    <input type="text" class="form-control" id="editarLinkSlide" name="editarLinkSlide" placeholder="Enlace al darle click...">
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
          $editarSlide = new ControladorSlides();
          $editarSlide -> ctrEditarSlide();
         ?>
      </form>
    </div>
  </div>
</div>