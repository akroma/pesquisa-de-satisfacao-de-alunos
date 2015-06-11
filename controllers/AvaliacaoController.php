<?php

namespace app\controllers;

use app\models\Item;
use Yii;
use app\models\Avaliacao;
use app\models\Turma;
use app\models\AvaliacaoSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AvaliacaoController implements the CRUD actions for Avaliacao model.
 */
class AvaliacaoController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['avaliar'],
                        'allow' => true,

                    ],
                    [
                    'allow' => true,
                    'roles' => ['@']]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],

                ],

            ],
        ];
    }

    /**
     * Lists all Avaliacao models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AvaliacaoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Avaliacao model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Avaliacao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Avaliacao();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Avaliacao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Avaliacao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Avaliacao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Avaliacao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Avaliacao::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAvaliar($turma = null)
    {

        if (empty($turma)) {
            $turma = new Turma;

            return $this->render('turma', ['turma' => $turma]);

        } else {
            $avaliacao = new Avaliacao();

            $turma = Turma::findOne(['id' => $turma]);

            $itens = Item::find()->all();

            if (Yii::$app->request->post()) {

                $avaliacao = Yii::$app->request->post('Avaliacao');
                $ok = true;
                foreach ($avaliacao as $a) {


                    $av = new Avaliacao();
                    $av->id_item = $a['id_item'];
                    $av->id_turma = $a['id_turma'];
                    $av->id_avaliado = $a['id_avaliado'];
                    $av->importancia = $a['importancia'];
                    $av->satisfacao = $a['satisfacao'];
                    $av->descricao = $a['descricao'];

                    if (!$av->save()) {
                        return new HttpException(500, 'Houve um erro ao salvar a sua avaliação :\'(');
                    }
                }

                return $this->render('obrigado');

            } elseif ($turma) {
                return $this->render('avaliar', [
                    'itens' => $itens,
                    'turma' => $turma,
                ]);
            } else {
                throw new HttpException(404, 'Turma Inválida :/');
            }
        }
    }


}
