@if ($paginator->hasPages())
<ul class="pagination justify-content-end">
    @if($paginator->onFirstPage())
    <li class="page-item disabled">
      <a class="page-link" href="#">Previous</a>
    </li>
    @else
    <li class="page-item">
      <a class="page-link" href="#">Previous</a>
    </li>
    @endif


    @foreach($elements as $element)
    @if(is_array($element))
    @foreach ($element as $page => $url)
    @if($page == $paginator->currentPage())
    <li class="page-item"><a class="page-link" href="{{$url}}">{{$page}}</a></li>
    @elseif($page == $paginator->currentPage() +1 || $page == $paginator->currentPage() + 2 ||  $page == $paginator->currentPage() + 3 || $page == $paginator->currentPage() - 1 || $page == $paginator->currentPage() -2 ||  $page == $paginator->currentPage() + 3)
    <li class="page-item"><a class="page-link" href="{{$url}}">{{$page}}</a></li>
    @endif
    @endforeach
    @endif
    @endforeach


    @if($paginator->hasMorePages())
    <li class="page-item">
      <a class="page-link" href="{{$url}}">Next</a>
    </li>
    @else
    <li class="page-item disabled">
      <a class="page-link" href="#">Next</a>
    </li>
    @endif
  </ul>
@endif