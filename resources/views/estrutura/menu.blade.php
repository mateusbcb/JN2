<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">JN 2</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/customers">Clientes</a>
                </li>
            </ul>
            @if (Auth::check())
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()['name'] }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">My Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="/logout">Sair</a></li>
                    </ul>
                </div>
            @else
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li>
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>
<nav>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">
            Placa do Carro
        </span>
        <input type="text" name="" class="form-control" onkeyup="showHint(this.value)" id="">
    </div>
    <div class="d-fixed bg-white">
        <span id="txtHint">
        {{-- Resposta do Search --}}
        </span>
    </div>
</nav>

<script>
	function showHint(str) {
		let elTextHint = document.getElementById("txtHint");
		if (str.length == 0) {
			elTextHint.innerHTML = "";
			return;
		} else {
			const xmlhttp = new XMLHttpRequest();
			xmlhttp.onload = function() {
				console.log(elTextHint);
				elTextHint.innerHTML = this.responseText;
			}
			xmlhttp.open("GET", "/search?busca=" + str);
			xmlhttp.send();
		}
	}
</script>