<?php



/**
 * Random color semi-tranparent and zero-opacticy
 *
 * @var collections
 */
function randomColorSet()
{
    $r = rand(0, 255);
    $g = rand(0, 255);
    $b = rand(0, 255);

    return collect([
            'semi' => "rgba({$r}, {$g}, {$b}, 0.25)",
            'full' => "rgba({$r}, {$g}, {$b}, 1)",
        ]);
}

function currency($value) {
    return 'Rs.&nbsp;'.number_format(round($value, 2), 2).'/-';
}

function percentage($value) {
    return round($value, 2) * 100 . "%";
}

function parameter($id)
{
	$parameter = app('App\Parameter');

    if(is_int($id))
        return $parameter->find($id);

	return App\Parameter::where('slug', $id)->first();

}

function perDay($value) 
{
    return $value / parameter('work_days')->value;
}

function perHour($value)
{
    return perDay($value) / parameter('work_hours')->value;
}

function resourceNames($name)
{
    return [
        'names' => [
            'store'     => $name . '.store',
            'index'     => $name . '.index',
            'create'    => $name . '.create',
            'update'    => $name . '.update',
            'show'      => $name . '.show',
            'destroy'   => $name . '.destroy',
            'edit'      => $name . '.edit'
        ]
    ];
}

function commentRoutes($parent) {

    Route::get('/'.$parent.'/{'.$parent.'}/comment', [
        'uses' => 'CommentsController@'.$parent.'Index', 
        'as' => $parent.'.comment.index'
    ]);

    Route::post('/'.$parent.'/{'.$parent.'}/comment/', [
        'uses' => 'CommentsController@'.$parent.'Store', 
        'as' => $parent.'.comment.store'
    ]);

    Route::patch('/'.$parent.'/{'.$parent.'}/comment/{comment}', [
        'uses' => 'CommentsController@'.$parent.'Update', 
        'as' => $parent.'.comment.update'
    ]);

    Route::delete('/'.$parent.'/{'.$parent.'}/comment/{comment}', [
        'uses' => 'CommentsController@'.$parent.'Destroy', 
        'as' => $parent.'.comment.destroy'
    ]);

}

function flash($title = null, $message = null)
{
	$flash = app('App\Http\Alert');

	if(func_num_args() == 0) {
		return $flash;
	}

	return $flash->message($title, $message);
}

function notification($message = null)
{
    $notification = app('App\Http\Notification');

    if(func_num_args() == 0) {
        return $notification;
    }

    return $notification->message($message);
}

/**
 * Blade template helpers
 *
 */

function getLabels($items, $field = 'name', $class = 'label label-default')
{
    $html = '';

    foreach($items as $item)
        $html .= '<span class="'.$class.'">'.$item->$field.'</span> ';

    return $html;
}

function getLabel($object, $class = '')
{
    return '<label class="label label-default '.$class.'" style="background: '.$object->color.'">'.$object->name.'</label>';

}

function getColorBox($color = '#06f')
{
    return '<i class="fa fa-square" aria-hidden="true" style="color: '.$color.'"></i>';
}

function getBoolSymbol($bool = false)
{
    return ($bool) ? '<i class="fa fa-check text-success" aria-hidden="true"></i>' : '<i class="fa fa-times text-danger" aria-hidden="true"></i>';
}

function getModifyButton($url, $class, $text = '', $options = [], $disabled = false)
{
    if($text != '')
        $text = ' &nbsp; '.$text;

    $button = '<a href="' . $url . '" class="btn btn-xs btn-default '. ($disabled ? 'disabled' : '') .'"';
    foreach($options as $attr => $value) {
        $button .= ' ' . $attr . '="' . $value . '"';
    }
    $button .= '><i class="fa ' . $class . '"></i>'.$text.'</a>';

    return $button;
}

function getDeleteButton($url, $text = '', $disabled = false)
{
    if($text != '')
        $text = ' &nbsp; '.$text;

    $html = 
        '<form class="delete-form" action="'.$url.'" method="POST">
            <input type="hidden" name="_method" value="DELETE">'.
            csrf_field()
            .'<button type="submit" class="btn btn-xs btn-danger '. ($disabled ? 'disabled' : '') .'">
                <i class="fa fa-trash"></i>'.$text.'
            </button>
        </form>';

    if ($disabled)
        $html = '<button type="submit" class="btn btn-xs btn-danger disabled"><i class="fa fa-trash"></i></button>';
    
    return $html;
}