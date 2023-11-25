<x-layout title="Cadastro do Produto">
    <div class="container mt-5">
        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            <div class="mb-3">
                <label for="code" class="form-label">Código de identificação</label>
                <input type="text" class="form-control" id="code" name="code" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">Link da imagem</label>
                <input type="url" class="form-control" id="image_url" name="image_url" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Preço</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="cep" class="form-label">CEP do Galpão</label>
                <input type="text" class="form-control" id="cep" name="cep"  placeholder="Apenas números" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
    <script src="{{asset('js/index.js')}}"></script>
</x-layout>
