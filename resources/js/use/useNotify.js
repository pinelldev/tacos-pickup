import Swal from "sweetalert2";
import 'sweetalert2/dist/sweetalert2.min.css';

export default function useNotify() {
    function success(message) {
        Swal.fire({
            icon: "success",
            title: "Success",
            text: message,
            position: "top-end",
            toast: "true",
            iconColor: '#12BCFF',
            timer: 2000,
            showCancelButton: false,
            showConfirmButton: false,
        });
    }

    function error(message) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: message,
            position: "top-end",
            toast: "true",
            timer: 2000,
            showCancelButton: false,
            showConfirmButton: false,
        });
    }

    function confirm(done, message = "Are you sure?", title = "Confirm", onCancel = null, extra = {}) {
        Swal.fire({
            icon: "info",
            iconColor: "#12BCFF",
            title: title,
            text: message,
            showCancelButton: true,
            confirmButtonText: "Yes. I'm sure",
            confirmButtonColor: "#12BCFF",
            ...extra
        }).then((result) => {
            if (result.isConfirmed) {
                done();
            } else {
                if (onCancel) {
                    onCancel();
                }
            }
        });
    }

    return { success, error, confirm };
}
