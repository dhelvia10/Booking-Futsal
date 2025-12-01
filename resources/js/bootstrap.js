import axios from 'axios';
window.axios = axios;

// Header default
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// ===============================
// CEK JADWAL BENTROK
// ===============================
export async function checkSchedule(field_id, date, start_time, end_time) {
    try {
        const response = await axios.get('/api/check-schedule', {
            params: {
                field_id,
                date,
                start_time,
                end_time
            }
        });

        return response.data; // { available: true/false }

    } catch (error) {
        console.error("Error cek jadwal:", error);
        return { available: false, error: true };
    }
}

// ===============================
// SIMPAN BOOKING
// ===============================
export async function createBooking(field_id, date, start_time, end_time) {
    try {
        const response = await axios.post('/api/booking', {
            field_id,
            date,
            start_time,
            end_time
        });

        return response.data; // { success: true, data: ... }

    } catch (error) {
        console.error("Error booking:", error);
        return { success: false, error: true };
    }
}

// ===============================
// CONTOH CARA PAKAI
// ===============================

// Hanya contoh, bisa kamu hapus
window.testCekSchedule = async function () {
    const result = await checkSchedule(1, "2025-01-01", "10:00", "12:00");
    console.log("Hasil cek jadwal:", result);
};

window.testBooking = async function () {
    const result = await createBooking(1, "2025-01-01", "10:00", "12:00");
    console.log("Booking:", result);
};
