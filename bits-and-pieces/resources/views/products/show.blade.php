<x-layout>

    <h1>Product name</h1>
    <p>Description</p>

    <a href="">Edit</a>

    <form method="post" action="">
        @csrf
        @method('DELETE')

        <button>Delete</button>

    </form>

</x-layout>