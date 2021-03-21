@extends('layouts.headTable')

@section('content')

<x-btn nameBtn="Nuevo" :slug="$slug.'.create'"></x-btn>


<div class="container">
  <!-- Mensaje de confirmación -->
  @if (session('success'))
  <div class="alert alert-success text-center msg alert-dismissible fade show" id="success" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  <!-- EDN Mensaje de confirmación -->
</div>

<div class="card">
  <div class="card-header">
    <h3 class="card-title">{{$panel}}</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          @foreach($encabezados as $key)
          <th>{{$key}}</th>
          @endforeach
          <th colspan="3" class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $datos)
        <tr>
          @foreach($campos as $campo)
            <td>{{$datos[0]->$campo}}</td>
          @endforeach
          <td class="text-center">{{count($datos)}}</td>
          <td>
            <button class="link-primary btn-show" data-toggle="modal" data-target="#modalDetail-{{$datos[0]->id}}">Ver</button>
          </td>
          <td>
            <a href="{{ route($slug.'.edit',$datos[0]->id)}}" class="btn btn-sm ">
              <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.7945 3.30023L17.0214 0.524806C16.3227 -0.174488 15.1072 -0.175831 14.4058 0.526149L1.9829 13.0716C1.92783 13.1272 1.8881 13.1954 1.86643 13.2704L0.0177393 19.7464C-0.0283199 19.9077 0.0168294 20.0816 0.135552 20.2004C0.223554 20.2885 0.341367 20.336 0.462342 20.336C0.504762 20.336 0.547658 20.3301 0.589168 20.3183L7.05968 18.468C7.13459 18.4464 7.20275 18.4066 7.25826 18.3515L19.7945 5.91667C20.1438 5.56705 20.3361 5.10264 20.3361 4.60847C20.3361 4.1143 20.1438 3.64985 19.7945 3.30023ZM12.3918 3.88816L14.093 5.58945L5.21068 14.4718L4.57322 13.1965C4.49466 13.0399 4.33491 12.941 4.15977 12.941H3.41962L12.3918 3.88816ZM1.13529 19.2008L1.73731 17.0934L3.24266 18.5987L1.13529 19.2008ZM6.47066 17.6766L4.25934 18.3083L2.02775 16.0767L2.65945 13.8654H3.87401L4.67062 15.4586C4.7153 15.548 4.78796 15.6207 4.87735 15.6654L6.47061 16.462V17.6766H6.47066ZM7.39505 16.9164V16.1763C7.39505 16.0012 7.29621 15.8414 7.13958 15.7628L5.86422 15.1254L14.7466 6.24303L16.4479 7.94432L7.39505 16.9164ZM19.1423 5.27397L17.1043 7.29368L13.0423 3.23168L15.0607 1.19515C15.4101 0.84579 16.0185 0.84579 16.3678 1.19515L19.1409 3.96824C19.3156 4.1429 19.4117 4.37488 19.4117 4.62177C19.4117 4.86867 19.3156 5.10065 19.1423 5.27397Z" fill="black" fill-opacity="0.5"/>
                <path d="M19.7945 3.30023L17.0214 0.524806C16.3227 -0.174488 15.1072 -0.175831 14.4058 0.526149L1.9829 13.0716C1.92783 13.1272 1.8881 13.1954 1.86643 13.2704L0.0177393 19.7464C-0.0283199 19.9077 0.0168294 20.0816 0.135552 20.2004C0.223554 20.2885 0.341367 20.336 0.462342 20.336C0.504762 20.336 0.547658 20.3301 0.589168 20.3183L7.05968 18.468C7.13459 18.4464 7.20275 18.4066 7.25826 18.3515L19.7945 5.91667C20.1438 5.56705 20.3361 5.10264 20.3361 4.60847C20.3361 4.1143 20.1438 3.64985 19.7945 3.30023ZM12.3918 3.88816L14.093 5.58945L5.21068 14.4718L4.57322 13.1965C4.49466 13.0399 4.33491 12.941 4.15977 12.941H3.41962L12.3918 3.88816ZM1.13529 19.2008L1.73731 17.0934L3.24266 18.5987L1.13529 19.2008ZM6.47066 17.6766L4.25934 18.3083L2.02775 16.0767L2.65945 13.8654H3.87401L4.67062 15.4586C4.7153 15.548 4.78796 15.6207 4.87735 15.6654L6.47061 16.462V17.6766H6.47066ZM7.39505 16.9164V16.1763C7.39505 16.0012 7.29621 15.8414 7.13958 15.7628L5.86422 15.1254L14.7466 6.24303L16.4479 7.94432L7.39505 16.9164ZM19.1423 5.27397L17.1043 7.29368L13.0423 3.23168L15.0607 1.19515C15.4101 0.84579 16.0185 0.84579 16.3678 1.19515L19.1409 3.96824C19.3156 4.1429 19.4117 4.37488 19.4117 4.62177C19.4117 4.86867 19.3156 5.10065 19.1423 5.27397Z" fill="black" fill-opacity="0.5"/>
                <path d="M19.7945 3.30023L17.0214 0.524806C16.3227 -0.174488 15.1072 -0.175831 14.4058 0.526149L1.9829 13.0716C1.92783 13.1272 1.8881 13.1954 1.86643 13.2704L0.0177393 19.7464C-0.0283199 19.9077 0.0168294 20.0816 0.135552 20.2004C0.223554 20.2885 0.341367 20.336 0.462342 20.336C0.504762 20.336 0.547658 20.3301 0.589168 20.3183L7.05968 18.468C7.13459 18.4464 7.20275 18.4066 7.25826 18.3515L19.7945 5.91667C20.1438 5.56705 20.3361 5.10264 20.3361 4.60847C20.3361 4.1143 20.1438 3.64985 19.7945 3.30023ZM12.3918 3.88816L14.093 5.58945L5.21068 14.4718L4.57322 13.1965C4.49466 13.0399 4.33491 12.941 4.15977 12.941H3.41962L12.3918 3.88816ZM1.13529 19.2008L1.73731 17.0934L3.24266 18.5987L1.13529 19.2008ZM6.47066 17.6766L4.25934 18.3083L2.02775 16.0767L2.65945 13.8654H3.87401L4.67062 15.4586C4.7153 15.548 4.78796 15.6207 4.87735 15.6654L6.47061 16.462V17.6766H6.47066ZM7.39505 16.9164V16.1763C7.39505 16.0012 7.29621 15.8414 7.13958 15.7628L5.86422 15.1254L14.7466 6.24303L16.4479 7.94432L7.39505 16.9164ZM19.1423 5.27397L17.1043 7.29368L13.0423 3.23168L15.0607 1.19515C15.4101 0.84579 16.0185 0.84579 16.3678 1.19515L19.1409 3.96824C19.3156 4.1429 19.4117 4.37488 19.4117 4.62177C19.4117 4.86867 19.3156 5.10065 19.1423 5.27397Z" fill="black" fill-opacity="0.5"/>
              </svg>
            </a>
          </td>
          <td>
            <!-- Eliinar el registro a travez del modal que está más abajo -->
            <button type="submit" class="btn btn-sm" data-toggle="modal" data-target="#modal-{{$datos[0]->id}}">
              <svg width="17" height="21" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.392 7.58337C11.1213 7.58337 10.9019 7.80281 10.9019 8.07357V17.3382C10.9019 17.6088 11.1213 17.8284 11.392 17.8284C11.6628 17.8284 11.8822 17.6088 11.8822 17.3382V8.07357C11.8822 7.80281 11.6628 7.58337 11.392 7.58337Z" fill="black" fill-opacity="0.5"/>
                <path d="M11.392 7.58337C11.1213 7.58337 10.9019 7.80281 10.9019 8.07357V17.3382C10.9019 17.6088 11.1213 17.8284 11.392 17.8284C11.6628 17.8284 11.8822 17.6088 11.8822 17.3382V8.07357C11.8822 7.80281 11.6628 7.58337 11.392 7.58337Z" fill="black" fill-opacity="0.5"/>
                <path d="M11.392 7.58337C11.1213 7.58337 10.9019 7.80281 10.9019 8.07357V17.3382C10.9019 17.6088 11.1213 17.8284 11.392 17.8284C11.6628 17.8284 11.8822 17.6088 11.8822 17.3382V8.07357C11.8822 7.80281 11.6628 7.58337 11.392 7.58337Z" fill="black" fill-opacity="0.5"/>
                <path d="M5.60787 7.58337C5.33711 7.58337 5.11768 7.80281 5.11768 8.07357V17.3382C5.11768 17.6088 5.33711 17.8284 5.60787 17.8284C5.87862 17.8284 6.09806 17.6088 6.09806 17.3382V8.07357C6.09806 7.80281 5.87862 7.58337 5.60787 7.58337Z" fill="black" fill-opacity="0.5"/>
                <path d="M5.60787 7.58337C5.33711 7.58337 5.11768 7.80281 5.11768 8.07357V17.3382C5.11768 17.6088 5.33711 17.8284 5.60787 17.8284C5.87862 17.8284 6.09806 17.6088 6.09806 17.3382V8.07357C6.09806 7.80281 5.87862 7.58337 5.60787 7.58337Z" fill="black" fill-opacity="0.5"/>
                <path d="M5.60787 7.58337C5.33711 7.58337 5.11768 7.80281 5.11768 8.07357V17.3382C5.11768 17.6088 5.33711 17.8284 5.60787 17.8284C5.87862 17.8284 6.09806 17.6088 6.09806 17.3382V8.07357C6.09806 7.80281 5.87862 7.58337 5.60787 7.58337Z" fill="black" fill-opacity="0.5"/>
                <path d="M1.39222 6.23143V18.3087C1.39222 19.0226 1.65398 19.6929 2.11123 20.1739C2.56639 20.6563 3.19981 20.9301 3.86271 20.9312H13.1373C13.8004 20.9301 14.4338 20.6563 14.8888 20.1739C15.346 19.6929 15.6078 19.0226 15.6078 18.3087V6.23143C16.5167 5.99017 17.1057 5.11203 16.9841 4.17933C16.8624 3.24682 16.0679 2.54925 15.1274 2.54906H12.6176V1.93632C12.6205 1.42105 12.4167 0.926258 12.052 0.562253C11.6872 0.198439 11.1916 -0.00414818 10.6764 6.44071e-05H6.32363C5.80835 -0.00414818 5.3128 0.198439 4.94803 0.562253C4.58326 0.926258 4.37952 1.42105 4.38239 1.93632V2.54906H1.87265C0.932095 2.54925 0.13764 3.24682 0.015858 4.17933C-0.105732 5.11203 0.483263 5.99017 1.39222 6.23143ZM13.1373 19.9509H3.86271C3.0246 19.9509 2.37261 19.2309 2.37261 18.3087V6.27452H14.6274V18.3087C14.6274 19.2309 13.9754 19.9509 13.1373 19.9509ZM5.36277 1.93632C5.35952 1.68108 5.45986 1.43541 5.641 1.25522C5.82195 1.07504 6.06819 0.976043 6.32363 0.980447H10.6764C10.9318 0.976043 11.1781 1.07504 11.359 1.25522C11.5401 1.43521 11.6405 1.68108 11.6372 1.93632V2.54906H5.36277V1.93632ZM1.87265 3.52944H15.1274C15.6147 3.52944 16.0097 3.92447 16.0097 4.41179C16.0097 4.89911 15.6147 5.29413 15.1274 5.29413H1.87265C1.38533 5.29413 0.990305 4.89911 0.990305 4.41179C0.990305 3.92447 1.38533 3.52944 1.87265 3.52944Z" fill="black" fill-opacity="0.5"/>
                <path d="M1.39222 6.23143V18.3087C1.39222 19.0226 1.65398 19.6929 2.11123 20.1739C2.56639 20.6563 3.19981 20.9301 3.86271 20.9312H13.1373C13.8004 20.9301 14.4338 20.6563 14.8888 20.1739C15.346 19.6929 15.6078 19.0226 15.6078 18.3087V6.23143C16.5167 5.99017 17.1057 5.11203 16.9841 4.17933C16.8624 3.24682 16.0679 2.54925 15.1274 2.54906H12.6176V1.93632C12.6205 1.42105 12.4167 0.926258 12.052 0.562253C11.6872 0.198439 11.1916 -0.00414818 10.6764 6.44071e-05H6.32363C5.80835 -0.00414818 5.3128 0.198439 4.94803 0.562253C4.58326 0.926258 4.37952 1.42105 4.38239 1.93632V2.54906H1.87265C0.932095 2.54925 0.13764 3.24682 0.015858 4.17933C-0.105732 5.11203 0.483263 5.99017 1.39222 6.23143ZM13.1373 19.9509H3.86271C3.0246 19.9509 2.37261 19.2309 2.37261 18.3087V6.27452H14.6274V18.3087C14.6274 19.2309 13.9754 19.9509 13.1373 19.9509ZM5.36277 1.93632C5.35952 1.68108 5.45986 1.43541 5.641 1.25522C5.82195 1.07504 6.06819 0.976043 6.32363 0.980447H10.6764C10.9318 0.976043 11.1781 1.07504 11.359 1.25522C11.5401 1.43521 11.6405 1.68108 11.6372 1.93632V2.54906H5.36277V1.93632ZM1.87265 3.52944H15.1274C15.6147 3.52944 16.0097 3.92447 16.0097 4.41179C16.0097 4.89911 15.6147 5.29413 15.1274 5.29413H1.87265C1.38533 5.29413 0.990305 4.89911 0.990305 4.41179C0.990305 3.92447 1.38533 3.52944 1.87265 3.52944Z" fill="black" fill-opacity="0.5"/>
                <path d="M1.39222 6.23143V18.3087C1.39222 19.0226 1.65398 19.6929 2.11123 20.1739C2.56639 20.6563 3.19981 20.9301 3.86271 20.9312H13.1373C13.8004 20.9301 14.4338 20.6563 14.8888 20.1739C15.346 19.6929 15.6078 19.0226 15.6078 18.3087V6.23143C16.5167 5.99017 17.1057 5.11203 16.9841 4.17933C16.8624 3.24682 16.0679 2.54925 15.1274 2.54906H12.6176V1.93632C12.6205 1.42105 12.4167 0.926258 12.052 0.562253C11.6872 0.198439 11.1916 -0.00414818 10.6764 6.44071e-05H6.32363C5.80835 -0.00414818 5.3128 0.198439 4.94803 0.562253C4.58326 0.926258 4.37952 1.42105 4.38239 1.93632V2.54906H1.87265C0.932095 2.54925 0.13764 3.24682 0.015858 4.17933C-0.105732 5.11203 0.483263 5.99017 1.39222 6.23143ZM13.1373 19.9509H3.86271C3.0246 19.9509 2.37261 19.2309 2.37261 18.3087V6.27452H14.6274V18.3087C14.6274 19.2309 13.9754 19.9509 13.1373 19.9509ZM5.36277 1.93632C5.35952 1.68108 5.45986 1.43541 5.641 1.25522C5.82195 1.07504 6.06819 0.976043 6.32363 0.980447H10.6764C10.9318 0.976043 11.1781 1.07504 11.359 1.25522C11.5401 1.43521 11.6405 1.68108 11.6372 1.93632V2.54906H5.36277V1.93632ZM1.87265 3.52944H15.1274C15.6147 3.52944 16.0097 3.92447 16.0097 4.41179C16.0097 4.89911 15.6147 5.29413 15.1274 5.29413H1.87265C1.38533 5.29413 0.990305 4.89911 0.990305 4.41179C0.990305 3.92447 1.38533 3.52944 1.87265 3.52944Z" fill="black" fill-opacity="0.5"/>
                <path d="M8.49996 7.58337C8.2292 7.58337 8.00977 7.80281 8.00977 8.07357V17.3382C8.00977 17.6088 8.2292 17.8284 8.49996 17.8284C8.77071 17.8284 8.99015 17.6088 8.99015 17.3382V8.07357C8.99015 7.80281 8.77071 7.58337 8.49996 7.58337Z" fill="black" fill-opacity="0.5"/>
                <path d="M8.49996 7.58337C8.2292 7.58337 8.00977 7.80281 8.00977 8.07357V17.3382C8.00977 17.6088 8.2292 17.8284 8.49996 17.8284C8.77071 17.8284 8.99015 17.6088 8.99015 17.3382V8.07357C8.99015 7.80281 8.77071 7.58337 8.49996 7.58337Z" fill="black" fill-opacity="0.5"/>
                <path d="M8.49996 7.58337C8.2292 7.58337 8.00977 7.80281 8.00977 8.07357V17.3382C8.00977 17.6088 8.2292 17.8284 8.49996 17.8284C8.77071 17.8284 8.99015 17.6088 8.99015 17.3382V8.07357C8.99015 7.80281 8.77071 7.58337 8.49996 7.58337Z" fill="black" fill-opacity="0.5"/>
              </svg>
            </button>
          </td>
        </tr>
        <!-- Detail Modal -->
          <div class="modal fade" id="modalDetail-{{$datos[0]->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <div>{{ $datos[0]->titulo}}</div>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-7">
                      <div class="mb-1">
                        <div>ISBN:
                        <span>{{$datos[0]->isbn}}</span></div>
                      </div>
                      <div class="mb-1">
                        <div>Autor:
                        <span>{{$datos[0]->autor}}</span></div>
                      </div>
                      <div class="mb-1">
                        <div>Editorial:
                        <span>{{$datos[0]->editorial}}</span></div>
                      </div>
                      <div class="mb-1">
                        {{$slug}}
                        <div>Estado:
                          @if($datos[0]->estado === 'Disponible')
                            <span class="available">{{$datos[0]->estado}}</span>
                          @else
                            <span class="notavailable">{{$datos[0]->estado}}</span>
                          @endif
                        </div>
                      </div>
                      <div class="mb-1">
                        <a href="{{ route($slug.'.edit',$datos[0]->id)}}">Editar</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal" id="ko">Cancelar</button>
                  <a href="{{ route('prestamos'.'.create', ['query' => $datos[0]->id])}}">Prestar</a>
                </div>
              </div>
            </div>
          </div>
        <!-- End Detail Modal -->
        <!-- Modal Eliminar-->
        <div class="modal fade" id="modal-{{$datos[0]->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <p class="text-center">Eliminar Registro<i class="fa fa-commenting-o fa-4x" ></i></p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p class="p-2 bg-danger text-white">¿En serio quieres eliminar el registro?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal" id="ko">No</button>
                <form id="form_eliminar" action="{{ route($slug.'.destroy', $datos[0]->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm" id="ok">Si</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modal Eliminar-->    
        @endforeach
      
      </tbody>
      <tfoot>
        <tr>
        <!-- Paginado -->
          @foreach($encabezados as $key)
            <th>{{$key}}</th>
          @endforeach
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<style>
.available {
  padding-left: 0.5rem;
  padding-right: 0.5rem;
  background: #d1fae5;
  color:#195f5e;
  font-weight: 600;
  border-radius: 9999px;
  display: inline-block;
}
.notavailable {
  padding-left: 0.5rem;
  padding-right: 0.5rem;
  background: #FCA5A5;
  color:#B91C1C;
  font-weight: 600;
  border-radius: 9999px;
  display: inline-block;
}
.btn-show {
  border: none;
  background: none;
  color: #007bff;
}
.btn-show:focus {
  outline: none
}
.btn-show:hover {
  color: #0056b3;
}
</style>

@endsection