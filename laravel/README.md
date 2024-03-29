## Anotações para meu aprendizado


### Wire Model bind para o Objeto

``` php
public User $user;
```

No método _mount()_ associar o Objeto usuário ao usuário logado

``` php
public function mount() {
    $this->user = auth()->user();
}
```

No blade adicionar _.user_ ao nome do input

``` html
<input id="name" wire:model.defer="user.name">
```

Na validação o nome das colunas também devem conter o nome do model

``` php
public function rules()
{
    return [
        'user.name' => 'required',
        'user.email' => 'email|required',
    ];
}
```

    Toda propriedade a ser feito um bind precisa ser adicionada ao método _rules()_ ou _FormRequest_

Para salvar o Objeto em um update, por exemplo

``` php
$this->user->save();
```


### Como usar Form Request

No componente do Livewire, criar um método chamado _rules()_

``` php
protected function rules(): array
{
    return (new FormRequest())->rules();
}
```

No método de store/update chamar o _validate()_

``` php
$this->validate();
```

### Wire:keydown

O método wire:keydown="methodName" permite executar uma ação enquanto eu digito em um input. Ex: Aplicar validação em tempo real.

No input

``` html
<input wire:model.defer="user.email" wire:keydown="checkFields">
@if($errors->has('user.email'))
    <div class="invalid-feedback">{{ $errors->first('user.email') }}</div>
@endif
```

No Componente do Livewire
``` php
public function checkFields()
{
    $this->validate();
}
```

### Método _mount()_ com parâmetro da URL pagar buscar usuário

No Componente

``` php
public function mount() {
    $this->user = User::find(request('user_id'));
}
```

Na rota

``` php
//Redireciona o usuário após o login para a rota home passando o ID do usuário logado
Route::get('home', function() {
   return redirect(route('home', auth()->user()->getAuthIdentifier()));
});

Route::get('/home/{user_id}', [HomeController::class, 'index'])->name('home');
```

### Usando wire:click para retornar true|false

``` php
//No blade.php em algum button
wire:click="$toggle('show')"

//No Component do Livewire
public $show = false;
```

### Adicionar evento e escutar evento para emitir um alerta

No componente do evento um atributo para o contador, o listener e um method para fazer o increment do contador

``` php
public int $notificationsCount = 0;

protected $listeners = [
    'profileUpdated' => 'incrementNotificationsCount'
];

public function incrementNotificationsCount() {
    $this->notificationsCount++;
}
```

No componente que deve chamar o o listener (ao fim do codigo executado)

``` php
$this->emit('profileUpdated');
```

No arquivo principal do layout ou onde o evento devera ser chamado o codigo em js _window.livewire.on()_ deve ser
chamado para escutar o evento quando ele for chamado para exibir a notificacao

``` html
<!-- CDN para o sweet alert funcionar -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Codigo JS que ficara escutando o evento -->
<script>
    window.livewire.on('profileUpdated', function() {
        Swal.fire({
            title: 'Profile Updated',
            text: 'You have updated your profile',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
    });
</script>
```

### Paginacao sem refresh da pagina

No Componente

``` php
use WithPagination;
protected $paginationTheme = 'bootstrap';
```

Na view apos o foreach (e o fim da table) 

``` html
{{ $products->links() }}
```

### Barra de busca em tempo real

No blade

``` html
<input wire:model="searchQuery" class="form-control">
```

No Componente
``` php 
public string $searchQuery = '';
public int $currentPage;

public function render()
{
    $this->searchQuery == '' ? $this->currentPage = 0 : $this->currentPage = 1;

    $products = \App\Models\Product::when($this->searchQuery != '', function($query) {
        $query->where('name', 'like', '%'.$this->searchQuery.'%');
    })
    ->paginate(10, ['*'], 'page', $this->currentPage);

    return view('livewire.product', compact('products'));
}
```

### Exibir aviso de informacoes sendo carregadas

No componente que sera exibido apenas quando informacoes estiverem sendo carregadas do banco

``` html
<img wire:loading src="{{ asset('loading-gif.gif') }}">
```

### Auto refresh em components

Adicione um _wire:poll_ no seu componente como no exemplo

``` html
<div class="card-body" wire:poll.3s>
    <!-- stuff -->
</div>
```

### Usando prefetch para carregar dados antes de clicar no link

No blade

``` html
<button wire:click.prefetch="getPrice">Get Price</button>
```
