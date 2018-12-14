# Laravel: autoview helper

Helper to return the views without specifying a path. A simple way to force a consistent organization of ```resources/views``` folder.

## Installation

Require the package in your composer.json.

```
composer require omatech/laravel-autoview
```

## Usage

First, organize your views (blades) inside a folder following a basic structure, according to the controller and the action. For example, if we have a controller called ```ProductController``` with an action called ```index```, its view will be located in the folder ```product``` with name ```index.blade.php```.

In addition, it is advisable to group the views in a general folder, to differentiate it from components or layouts. This helper interprets that this folder is called ```pages```.

In this way, you can use the ```autoview()``` helper without having to specify the route where the view is located.

Therefore, instead of this:

```
public function index()
{
    return view('pages.product.index');
}

```


We will do this:

```
public function index()
{
    return autoview();
}
```

## Extras

* You can modify the name of general folder by publishing the configuration file and modifying the option ```pages_folder```. It can also be ignored by setting ```false```.

* If a view needs some data, you can use ```with``` method of class ```Illuminate\View\View```.

```
public function show($id)
{
    $product = Product::find($id);
    return autoview()->with(compact('title', 'subtitle'));
}
```

* If the blade is called differently from the action, it can be passed as a parameter.

```
public function showLoginForm()
{
    return autoview('login');
}
```

```
public function showLoginForm()
{
    $title = 'Login Title';
    return autoview('login')->with(compact('title'));
}
```

* You can ignore the basic structure by setting the second parameter to ```false```. Although to do this it is better to directly use ```view```.

```
public function showLoginForm()
{
    $title = 'Login Title';
    return autoview('login', false); // = view('login')
}
```

## Credits

* [Adrià Roca](https://github.com/adriaroca)

## Organization

* [Omatech](https://www.omatech.com)

## Contributors

See the contributors list [here](https://github.com/omatech/laravel-autoview/graphs/contributors).

## License
[MIT license](http://opensource.org/licenses/MIT).
