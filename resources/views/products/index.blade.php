<x-layout title="Produtos">
    <a href="{{ route('products.create') }}" class="btn btn-dark mb-2">Adicionar</a>

    @isset($successMessage)
        <div class="alert alert-success">
            {{ $successMessage }}
        </div>
    @endisset
    @isset($errorMessage)
        <div class="alert alert-danger">
            {{ $errorMessage }}
        </div>
    @endisset

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Nome</th>
            <th scope="col">Imagem</th>
            <th scope="col">Preço</th>
            <th scope="col">CEP</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        @foreach ($products as $product)
            <tbody>
            <tr>
                <th scope="row">{{ $product->code }}</th>
                <td>{{ $product->name }}</td>
                <td><img width="50px" src="{{ $product->image_url }}" alt=""></td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->cep }}</td>
                <td>
                    <span class="d-flex align-items-center">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="post" class="ms-2">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Del</button>
                    </form>
                </span>
                </td>
            </tr>
        @endforeach
    </table>
</x-layout>
