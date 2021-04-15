<x-app-layout page="requirements"> 
    <div>
        <form action="" method="post" required>
            <select name="profile_requirements" id="prof_req">
                @foreach ($profile_req as $prof)
                    <option value="">{{$prof->name}}</option>
                @endforeach
            </select>

            <div id="group1">
                <p>DERECHOS DE IMAGEN</p>
                SI <input type="radio" value="val1" name="group1" required>
                NO <input type="radio" value="val2" name="group1">
            </div>
            ** Solo menores de edad
            <div id="group2">
                <p>AUTORIZACION DE SALIDAS</p>
                SI <input type="radio" value="val1" name="group2" required>
                NO <input type="radio" value="val2" name="group2">
            </div>
            <div id="group3">
                <p>AUTORIZACION DE EXTRAESCOLARES</p>
                SI <input type="radio" value="val1" name="group3" required>
                NO <input type="radio" value="val2" name="group3">
            </div>
            **
            <br>
            <input type="submit" value="Enviar">
        </form>
    </div>
</x-app-layout>

