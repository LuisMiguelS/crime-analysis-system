<!-- technology-right -->
<div class="col-md-3 technology-right">
	<div class="blo-top">
		<div class="tech-btm">
		<img src="{{ asset('front-end/images/logo.png') }}" class="img-responsive" style="margin: 0 auto;" alt=""/>
		</div>
	</div>
	<div class="blo-top">
		<div class="tech-btm">
			<h4 class="text-center">THE C·A·S BLOG</h4>
			<p class="text-justify">Mantente informado con las noticias de último minuto. Mantenido por C·A·S.</p>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="blo-top1">
		<div class="tech-btm">
		<h4 class="text-center" style="color: #f53f1a;">Criminales Buscados</h4>
			<div class="blog-grids">
				@foreach($danger_person as $danger)
			        <div class="blog-grid-left">
			            <a><img src="{{ asset('images/'.$danger->person->id) }}.jpg" class="img-responsive" alt=""/></a>
			        </div>
			        <div class="blog-grid-right">
			            <h5>
			                {{ $danger->person->nombres }} {{ $danger->person->apellidos }}
			            </h5>
			            <p>{!! $danger->status_person !!}</p>
			        </div>
			        <div class="clearfix"></div>
			    @endforeach
			</div>
		</div>
	</div>
</div>

<div class="clearfix"></div>