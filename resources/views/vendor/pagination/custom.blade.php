<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if ($paginator->hasPages())
    <nav class="pagination-a">
      <ul class="pagination justify-content-end">
        @if ($paginator->onFirstPage())
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1">
            <span class="ion-ios-arrow-back"></span>
          </a>
        </li>
        @else
        <li class="page-item">
          <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
            <span class="ion-ios-arrow-back"></span>
          </a>
        </li>
        @endif
        @foreach ($elements as $element)
        @if (is_string($element))
        <li class="page-item disabled">{{ $element }}</li>
        @endif

        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="page-item active">
          <a class="page-link">{{ $page }}</a>
        </li>
        @else
        <li class="page-item">
          <a class="page-link" href="{{ $url }}">{{ $page }}</a>
        </li>
        @endif
        @endforeach
        @endif
        @endforeach

        @if ($paginator->hasMorePages())
        <li class="page-item next">
          <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
            <span class="ion-ios-arrow-forward"></span>
          </a>
        </li>
        @else
        <li class="page-item next disabled">
          <a class="page-link" href="#">
            <span class="ion-ios-arrow-forward"></span>
          </a>
        </li>
        @endif
      </ul>
    </nav>
    @endif
</body>
</html>