 <h3>Cliente - App (view)</h3>
 
<form action={{ route('app.cliente') }} method="post">
	@csrf
	<input type="text" name="nome" placeholder="Nome">
	<br>
	<input type="text" name="email" placeholder="E-mail">
	<br>
	<input type="text" name="documento" placeholder="Documento">
	<br>
	<button type="submit">ENVIAR</button>
</form>