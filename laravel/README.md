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
