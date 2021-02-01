<?php

namespace DogCeo;

class DogCeoAPI {

    /**
     * Function to get the list of all breeds
     * @return mixed
     * @throws \Exception
     */
    public static function getAllBreeds() {
        $response = self::request("https://dog.ceo/api/breeds/list/all");
        return self::response($response);
    }

    /**
     * Function to get a random image path from the dog collection
     * @return mixed
     * @throws \Exception
     */
    public static function random() {
        $response = self::request("https://dog.ceo/api/breeds/image/random");
        return self::response($response);
    }

    /**
     * Function to get image paths by breed
     * @return mixed
     * @throws \Exception
     */
    public static function getImageByBreed($breed) {
        $response = self::request("https://dog.ceo/api/breed/{$breed}/images");
        return self::response($response);
    }

    /**
     * Function to get image paths by sub breed
     * @param $breed
     * @return mixed
     */
    public static function getImageBySubBreed($breed, $subBreed) {
        $response = self::request("https://dog.ceo/api/breed/{$breed}/{$subBreed}/images");
        return self::response($response);
    }

    /**
     * @param $url
     * @return bool|string
     */
    private static function request($url) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }

    /**
     * @param $response
     * @return mixed
     */
    private static function response($response) {
        $response = json_decode($response,true);

        if (!isset($response['status'])
            || $response['status'] !== 'success'
        ) {
            return array_get($response, 'message', 'Failed to retrieve random image');
        }

        return $response['message'];
    }
}