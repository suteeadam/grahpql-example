<?php 
namespace App\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use App\Models\User;

class CreateUserMutation extends Mutation {

	protected $attributes = [
		'name' => 'CreateUser'
	];

	public function type()
	{
		return GraphQL::type('User');
	}

	public function args()
	{
		return [
			'email' => [
				'name' => 'email',
				'type' => Type::string()
			],
			'password' => [
				'name' => 'password',
				'type' => Type::string()
			],
			'name' => [
				'name' => 'name',
				'type' => Type::string()
			],
			'code' => [
				'name' => 'code',
				'type' => Type::string()
			]
		];
	}

	public function resolve($root, $args)
	{		

		$args['password'] = bcrypt($args['password']);
		$user = User::create($args);

		return $user;

	}

}