<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <form id="form" method="POST" action="{{route('character.store')}}">
            @csrf
            <label>name</label>
            <input type="text" name="name" class="form-control" />
            <label>start</label>
            <input type="text" name="start" class="form-control" />
            <div id="constant_items">
                <label for="constant_items">Constant items:</label>
                <input type="text" name="constant_item[]" id="constant_item" />
                <button type="button" id="add_constant_item" class="btn btn-primary btn-block">
                    Add new constant item
                </button>
            </div>
            <div class="div" id="random_items">
                <label for="random_items">Random items</label>
                <input type="text" name="random_item[]" id="random_item" />
                <button type="button" id="add_random_item" class="btn btn-primary btn-block">
                    Add new random item
                </button>
            </div>
            <label>skill</label>
            <input type="text" name="skill" class="form-control" />
            <label>sanity</label>
            <input type="text" name="sanity" class="form-control" />
            <label>stamina</label>
            <input type="text" name="stamina" class="form-control" />
            <label>focus</label>
            <input type="text" name="focus" class="form-control" />
            <label>max speed</label>
            <input type="text" name="max_speed" class="form-control" />
            <label>min speed</label>
            <input type="text" name="min_speed" class="form-control" />
            <label>max sneak</label>
            <input type="text" name="max_sneak" class="form-control" />
            <label>min sneak</label>
            <input type="text" name="min_sneak" class="form-control" />
            <label>max fight</label>
            <input type="text" name="max_fight" class="form-control" />
            <label>min fight</label>
            <input type="text" name="min_fight" class="form-control" />
            <label>max will</label>
            <input type="text" name="max_will" class="form-control" />
            <label>min will</label>
            <input type="text" name="min_will" class="form-cotrol" />
            <label>max lore</label>
            <input type="text" name="max_lore" class="form-control" />
            <label>min lore</label>
            <input type="text" name="min_lore" class="form-control" />
            <label>max luck</label>
            <input type="text" name="max_luck" class="form-control" />
            <label>min luck</label>
            <input type="text" name="min_luck" class="form-control" />
            
            <button type="submit" class="btn btn-primary btn-block">POST!</button>

        </form>
        <script>
            $(document).ready(function(){
        console.log('working');
        $('#add_random_item').click(function(){
            $('#random_items').append($('#random_item').clone(true));
        });
        $('#add_constant_item').click(function(){
            $('#constant_items').append($('#constant_item').clone(true));
        });
            });
        </script>
    </body>
</html>