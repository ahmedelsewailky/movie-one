<div class="modal fade confirm-modal" id="confirmDelete{{ $ser->id }}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('series.destroy', $ser->id) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <i class='bx bx-error'></i>
                    <p>انت الآن علي وشك حذف هذا السجل، <strong>هل أنت متأكد من هذا الإجراء؟</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-danger">نعم متأكد</button>
                </div>
            </form>
        </div>
    </div>
</div>
