<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class XacNhanPhieuTiemEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->email_data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_USERNAME'),'Hệ thống tiêm chủng Đà Nẵng')
            ->subject("Thông báo phiếu đăng ký tiêm đã được xác nhận!")
            ->view('admin.students.email',['email_data'=>$this->email_data]);
    }
}
