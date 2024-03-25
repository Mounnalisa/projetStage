@extends('master')

@section("main")
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="column" style="background-color:#31363F" id="todo" ondragover="dragOver(event)" ondrop="dragDrop(event)" ondragenter="dragEnter(event)" ondragleave="dragLeave(event)">
        <h2 class="status-title bg-gray">À faire</h2>
        <div class="status"></div>
        @foreach($tasks as $task)
          @if ($task->status === 'à faire')
            <div class="card mb-2" draggable="true" id="{{ $task->id }}" ondragstart="dragStart(event)">
              <div class="card-body p-2"> <!-- Added p-2 class for padding -->
                {{ $task->title }}
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
    <div class="col-md-4">
      <div class="column"  style="background-color: #31363F" id="inprogress" ondragover="dragOver(event)" ondrop="dragDrop(event)" ondragenter="dragEnter(event)" ondragleave="dragLeave(event)">
        <h2 class="status-title bg-yellow">En cours</h2>
        <div class="status"></div>
        @foreach($tasks as $task)
          @if ($task->status === 'en cours')
            <div class="card mb-2" draggable="true" id="{{ $task->id }}" ondragstart="dragStart(event)">
              <div class="card-body p-2"> <!-- Added p-2 class for padding -->
                {{ $task->title }}
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
    <div class="col-md-4">
      <div class="column" style="background-color: #31363F" id="done" ondragover="dragOver(event)" ondrop="dragDrop(event)" ondragenter="dragEnter(event)" ondragleave="dragLeave(event)">
        <h2 class="status-title bg-green">Terminé</h2>
        <div class="status"></div>
        @foreach($tasks as $task)
          @if ($task->status === 'terminer')
            <div class="card mb-2" draggable="true" id="{{ $task->id }}" ondragstart="dragStart(event)">
              <div class="card-body p-2"> 
                {{ $task->title }}
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>
</div>
<script>
  function dragStart(event) {
    event.dataTransfer.setData("text/plain", event.target.id);
  }

  function dragOver(event) {
    event.preventDefault();
  }

  function dragEnter(event) {
    event.preventDefault();
    if (event.target.classList.contains('column')) {
      event.target.classList.add('over');
    }
  }

  function dragLeave(event) {
    event.target.classList.remove('over');
  }

  function dragDrop(event) {
    event.preventDefault();
    const id = event.dataTransfer.getData("text/plain");
    const draggableElement = document.getElementById(id);
    const dropzone = event.target;

    // Vérifier si la cible est une colonne
    if (dropzone.classList.contains('column')) {
      dropzone.classList.remove('over');
      dropzone.appendChild(draggableElement);
      updateStatus();
    }
  }

  function updateStatus() {
    const columns = document.querySelectorAll('.column');
    columns.forEach(column => {
      const statusElement = column.querySelector('.status');
      const count = column.querySelectorAll('.card').length;
      statusElement.textContent = count;
    });
  }

  // Initial count update
  updateStatus();
</script>
<style>
.column {
  border: 1px solid #ddd;
  padding: 1rem;
  border-radius: 0.5rem;
  margin-bottom: 1rem;
}

.card {
  background-color: #fff;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
  border-radius: 0.5rem;
  cursor: grab;
}

.status-title {
  color: #fff;
  padding: 0.5rem 1rem;
  border-radius: 0.5rem;
  margin-bottom: 0.5rem;
  font-size: 0.9rem;
}

.bg-gray {
  background-color: #999;
}

.bg-yellow {
  background-color: #ffc107;
}

.bg-green {
  background-color: #28a745;
}
</style>
@endsection
