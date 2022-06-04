<!-- Deleted inFormation Student -->
<div class="modal fade" id="edit_attendance{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">تعديل حضور
                    وغياب الطالب : {{$student->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('attendances.update')}}" method="post">
                    @csrf
                    <input type="hidden" name="student_id" value="{{$student->id}}">
                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                            <input name="attendances"
                            {{ $student->attendances()->latest()->first()->attendance_status == 1 ? 'checked' : '' }}
                             class="leading-tight" type="radio" value="attendant">
                            <span class="text-success">{{trans('attendance.Attendance')}}</span>
                        </label>

                        <label class="ml-4 block text-gray-500 font-semibold">
                            <input name="attendances"
                            {{ $student->attendances()->latest()->first()->attendance_status == 0 ? 'checked' : '' }}
                             class="leading-tight" type="radio" value="absent">
                            <span class="text-danger">{{trans('attendance.Absence')}}</span>
                        </label>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{trans('Students.Close')}}</button>
                        <button class="btn btn-danger">{{trans('Students.Submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
