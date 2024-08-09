<div class="btn-group">
    @can($showGate)
        <a class="btn btn-sm btn-primary me-1" href="{{route($route . '.show', $row->$primaryKey)}}" style="border-radius: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="View Details">
            <i class="fa-regular fa-eye"></i>
        </a>
    @endcan
    @can($updateGate)
        <a class="btn btn-sm btn-primary me-1" href="{{route($route . '.edit', $row->$primaryKey)}}" style="border-radius: 5px" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit Details">
            <i class="fa-regular fa-pen-to-square"></i>
        </a>
    @endcan
    @can($deleteGate)
        <form action="{{route($route . '.destroy', $row->$primaryKey)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this ?')" style="display: inline-block">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button type="submit" class="btn btn-sm btn-primary" value="Delete" style="color: white; border-radius: 5px" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete Details">
                <i class="fa-regular fa-trash-can"></i>
            </button>
        </form>
    @endcan
</div>
