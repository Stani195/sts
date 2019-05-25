    @extends ('layout')

    @section ('title','Language')
    @section('content')
            <label for="title">Title:</label>
            <input type="text" name="title" value="<?= $_POST['title'] ?>"> <br>

            <?php if (isset($messages['content'])): ?>
            <p><?= $messages['content'] ?></p>
            <?php endif; ?>
            <label for="content">Content:</label>
            <textarea type="text" name="content" cols="10" rows="5"><?= $_POST['content'] ?></textarea> <br>

            <input type="submit" value="Create new post">
        </form>
       <p>Пользователя не существуют</p>
        @else
      <ul>
        <li>{{$limba -> id}}</li>
        <li>{{$limba -> name}}</li>
        <li>{{$limba-> created_at}}</li>
    </ul>
    @endempty
    @endsection