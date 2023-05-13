<div>
    <h1 class="text-center font-bold text-red-600">Prueba datos tabla user</h1>
    <table>
        <tr>
            <th scope="row">Nombre</th>
            <th>email</th>
            <th>contraseña</th>
        </tr>
        @foreach ($usu as $datosu)
        <tr>
            <th> {{ $datosu->name }} </th>
            <td> {{ $datosu->email }} </td>
            <td> {{ $datosu->password }} </td>
        </tr>
        @endforeach
    </table>

    <br> <br>

    <h1 class="text-center font-bold text-red-600">Prueba datos tabla objetos</h1>
    <table>
        <tr>
            <th scope="row">Objeto</th>
            <th>Marca</th>
            <th>Color</th>
            <th>Ubicacion</th>
            <th>Descripcion</th>
            <th>valor sentimental</th>
            <th>Estado</th>
        </tr>
        @foreach ($objetos as $datosu)
        <tr>
            <th> {{ $datosu->objeto }} </th>
            <td> {{ $datosu->marca }} </td>
            <td> {{ $datosu->color }} </td>
            <td> {{ $datosu->ubicacion }} </td>
            <td> {{ $datosu->valor_sentimental }} </td>
            <td>
                @if ($datosu->estado == 1)
                    perdido
                @else
                    encontrado
                @endif
            </td>
        </tr>
        @endforeach
    </table>

    <h1 class="text-center font-bold text-red-600">Prueba datos tabla Clasificacion</h1>
    <table>
        <tr>
            <th scope="row">id</th>
            <th>etiqueta</th>
        </tr>
        @foreach ($clasificacion as $datosu)
        <tr>
            <th> {{ $datosu->id }} </th>
            <td> {{ $datosu->etiqueta }} </td>
        </tr>
        @endforeach
    </table>

    <h1 class="text-center font-bold text-red-600">Prueba relacion user-objeto</h1>
    <table>
        <tr>
            <th scope="row">Nombre usuario</th>
            <th>user id</th>
            <th>Objeto</th>
            <th>Marca</th>
        </tr>
        @foreach ($usu as $datosu)
        <tr>
            <th> {{ $datosu->name }} </th>
            <th> {{ $datosu->id }} </th>
            @foreach ($datosu->objetos as $item)
            <td> {{ $item->objeto }} </td>
            <td> {{ $item->marca }} </td>
            @endforeach
        </tr>
        @endforeach
    </table>

    <h1 class="text-center font-bold text-red-600">Prueba relacion objeto-clasificacion</h1>
    <table>
        <tr>
            <th scope="row">Objeto</th>
            <th>Etiqueta</th>
        </tr>
        @foreach ($objetos as $datosu)
        <tr>
            <th> {{ $datosu->objeto }} </th>
            @foreach ($datosu->clasificacion as $item)
            <td> {{ $item->etiqueta }} </td>
            @endforeach
        </tr>
        @endforeach
    </table>

</div>