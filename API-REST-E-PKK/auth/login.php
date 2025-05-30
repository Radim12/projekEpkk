<?php
header('Content-Type: application/json');
require '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents("php://input"), true);

    $phone_number = $input['phone_number'];
    $password = $input['password'];
    $input_role = $input['role'];

    $koneksi->autocommit(false);
    try {
        $result = $koneksi->query("SELECT * FROM users_mobile WHERE phone_number = '$phone_number'");
        $user = mysqli_fetch_object($result);

        if ($user) {
            if (password_verify($password, $user->password)) {
                if ($user->id_role == $input_role) {
                    $query = "
                        SELECT 
                            users_mobile.id,
                            users_mobile.uuid,
                            users_mobile.phone_number,
                            users_mobile.full_name,
                            users_mobile.status,
                            users_mobile.created_at,
                            users_mobile.updated_at,
                            subdistrict.id AS subdistrict_id,
                            subdistrict.uuid AS subdistrict_uuid,
                            subdistrict.name AS subdistrict_name,
                            village.id AS village_id,
                            village.uuid AS village_uuid,
                            village.name AS village_name,
                            role_users_mobile.id AS role_id,
                            role_users_mobile.uuid AS role_uuid,
                            role_users_mobile.name AS role_name,
                            role_organization.id AS organization_id,
                            role_organization.uuid AS organization_uuid,
                            role_organization.name AS organization_name
                        FROM users_mobile
                        LEFT JOIN subdistrict ON users_mobile.id_subdistrict = subdistrict.id
                        LEFT JOIN village ON users_mobile.id_village = village.id
                        LEFT JOIN role_users_mobile ON users_mobile.id_role = role_users_mobile.id
                        LEFT JOIN role_organization ON users_mobile.id_organization = role_organization.id
                        WHERE users_mobile.phone_number = '$phone_number'
                    ";

                    $result_detail = $koneksi->query($query);
                    $data_user = $result_detail->fetch_assoc();

                    $response = [
                        'statusCode' => 200,
                        'message' => 'Success Login',
                        'data' => [
                            'id' => $data_user['id'],
                            'uuid' => $data_user['uuid'],
                            'phoneNumber' => $data_user['phone_number'],
                            'fullName' => $data_user['full_name'],
                            'status' => $data_user['status'],
                            'createdAt' => $data_user['created_at'],
                            'updatedAt' => $data_user['updated_at'],
                            'subdistrict' => [
                                'id' => $data_user['subdistrict_id'],
                                'uuid' => $data_user['subdistrict_uuid'],
                                'name' => $data_user['subdistrict_name']
                            ],
                            'village' => [
                                'id' => $data_user['village_id'],
                                'uuid' => $data_user['village_uuid'],
                                'name' => $data_user['village_name']
                            ],
                            'role' => [
                                'id' => $data_user['role_id'],
                                'uuid' => $data_user['role_uuid'],
                                'name' => $data_user['role_name']
                            ],
                            'organization' => [
                                'id' => $data_user['organization_id'],
                                'uuid' => $data_user['organization_uuid'],
                                'name' => $data_user['organization_name'],
                            ],
                        ],
                        'error' => null
                    ];
                    http_response_code(200);
                } else {
                    $role_query = "SELECT name FROM role_users_mobile WHERE id = '$user->id_role'";
                    $role_result = $koneksi->query($role_query);
                    $role_data = $role_result->fetch_assoc();
                    $role_name = $role_data['name'];

                    // Role tidak sesuai
                    $response = [
                        'statusCode' => 403,
                        'data' => null,
                        'error' => ['message' => 'Role mismatch ' . $role_name . ', Please check again'] 
                    ];
                    http_response_code(403);
                }
            } else {
                // Jika password tidak cocok
                $response = [
                    'statusCode' => 401,
                    'data' => null,
                    'error' => ['message' => 'Incorrect password']
                ];
                http_response_code(401);
            }
        } else {
            // Nomor WhatsApp tidak terdaftar, tidak perlu memeriksa password
            $response = [
                'statusCode' => 404,
                'data' => null,
                'error' => ['message' => 'Phone number not registered']
            ];
            http_response_code(404);
        }

        $koneksi->commit();
    } catch (Exception $e) {
        $response = [
            'statusCode' => 500,
            'data' => null,
            'error' => ['message' => 'Server error.'. $e->getMessage()]
        ];
        http_response_code(500);
        $koneksi->rollback();
    }
    echo json_encode($response);
    mysqli_close($koneksi);
}
